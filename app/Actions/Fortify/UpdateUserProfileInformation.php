<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'bio' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');


        $contGit = Str::contains($input['githubLink'], 'https://github.com/');
        $contLinked = Str::contains($input['linkedinLink'], 'https://www.linkedin.com/in/');
        $contIg = Str::contains($input['igLink'], 'https://www.instagram.com/');



        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'bio' => $input['bio'],
            ])->save();

            $handling = [];
            if ($contGit) {
                $user->forceFill([
                    'githubLink' => $input['githubLink'],
                ])->save();
            }else if($contGit != null){
                throw ValidationException::withMessages(['githubLink' => 'This value is not valid']);
            }
            if ($contLinked) {
                $user->forceFill([
                    'linkedinLink' => $input['linkedinLink'],
                ])->save();
            }else if($contLinked != null){
                throw ValidationException::withMessages(['linkedinLink' => 'This value is not valid']);
            }
            if ($contIg) {
                $user->forceFill([
                    'igLink' => $input['igLink'],
                ])->save();
            }else if($contIg != null){
                throw ValidationException::withMessages(['igLink' => 'This value is not valid']);
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}