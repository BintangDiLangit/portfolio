@section('title')
    SEO
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SEO
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="/admin/seo/save" method="POST" data-parsley-validate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="Your Name" value="{{ isset($seo->name) ? $seo->name : '' }}">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Job Title</label>
                            <input type="text" name="job_title" class="form-control" id="exampleFormControlInput1"
                                placeholder="Job Title" value="{{ isset($seo->job_title) ? $seo->job_title : '' }}">
                            @error('job_title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image <span
                                    class="text-danger">*</span></label>
                            <input name="main_image" type="file" class="form-control" id="exampleFormControlFile1">
                            @error('main_image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Introducing <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description skill"
                                name="introducing">{{ isset($seo->introducing) ? $seo->introducing : '' }}</textarea>
                            @error('introducing')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Years Experience <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="years_experience" class="form-control"
                                id="exampleFormControlInput1" placeholder="Years Experience"
                                value="{{ isset($seo->years_experience) ? $seo->years_experience : '' }}">
                            @error('years_experience')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Phone Number"
                                value="{{ isset($seo->phone_number) ? $seo->phone_number : '' }}">
                            @error('phone_number')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleFormControlInput1"
                                placeholder="Address" value="{{ isset($seo->address) ? $seo->address : '' }}">
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Email" value="{{ isset($seo->email) ? $seo->email : '' }}">
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Instagram</label>
                            <input type="url" name="instagram" class="form-control" id="exampleFormControlInput1"
                                placeholder="Instagram" value="{{ isset($seo->instagram) ? $seo->instagram : '' }}">
                            @error('instagram')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">LinkedIn</label>
                            <input type="url" name="linkedin" class="form-control" id="exampleFormControlInput1"
                                placeholder="LinkedIn" value="{{ isset($seo->linkedin) ? $seo->linkedin : '' }}">
                            @error('linkedin')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Github</label>
                            <input type="url" name="github" class="form-control" id="exampleFormControlInput1"
                                placeholder="Github" value="{{ isset($seo->github) ? $seo->github : '' }}">
                            @error('github')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gitlab</label>
                            <input type="url" name="gitlab" class="form-control" id="exampleFormControlInput1"
                                placeholder="Gitlab" value="{{ isset($seo->gitlab) ? $seo->gitlab : '' }}">
                            @error('gitlab')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Medium</label>
                            <input type="url" name="medium" class="form-control" id="exampleFormControlInput1"
                                placeholder="Medium" value="{{ isset($seo->medium) ? $seo->medium : '' }}">
                            @error('medium')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Youtube</label>
                            <input type="url" name="youtube" class="form-control" id="exampleFormControlInput1"
                                placeholder="Job Title" value="{{ isset($seo->youtube) ? $seo->youtube : '' }}">
                            @error('youtube')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
