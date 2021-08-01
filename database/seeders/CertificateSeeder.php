<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certificates')->insert(
            [
                'name' => 'Training Web Development Path (Node.js) by Progate',
                'imgCert' => 'nodeJSWebDev.png',
                'linkCert' => 'https://stackoverflow.com/questions/35694905/laravel-validation-pdf-mime',
            ],
        );
        DB::table('certificates')->insert(
            [
                'name' => 'Training Ruby Course by Progate',
                'imgCert' => 'Ruby.png',
            ],
        );
        DB::table('certificates')->insert(
            [
                'name' => 'Training “Effective Writing for CV and Cover Letter” by eLearn.id Generasi Gigih',
                'imgCert' => 'elearnCV.jpeg',
            ]
        );
    }
}