@section('title')
    Add Skill
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Skill
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('skill.store') }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Skill <span class="text-danger">*</span></label>
                            <input type="text" name="skill_name" class="form-control" id="exampleFormControlInput1"
                                placeholder="Your Skill" value="{{ old('skill_name') }}">
                            @error('skill_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image <span
                                    class="text-danger">*</span></label>
                            <input name="skill_img" type="file" class="form-control-file" id="exampleFormControlFile1">
                            @error('skill_img') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="description skill" name="skill_desc">{{ old('skill_desc') }}</textarea>
                            @error('skill_desc') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
