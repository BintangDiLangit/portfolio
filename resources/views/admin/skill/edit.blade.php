@section('title')
    Edit Skill
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Skill
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('skill.update', $skill) }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Skill</label>
                            <input type="text" name="skill_name" class="form-control" id="exampleFormControlInput1"
                                placeholder="Your Skill" value="{{ $skill->skill_name }}">
                            @error('skill_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image</label>
                            <img src="{{ env('AWS_URL') . '/' . env('AWS_BUCKET') . '/storage/skill-images/' . $skill->skill_img }}"
                                class="rounded mx-auto d-block" style="width: 200px" alt="...">
                            <input name="skill_img" type="file" class="form-control-file"
                                id="exampleFormControlFile1">

                            @error('skill_img')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description skill"
                                name="skill_desc">{{ $skill->skill_desc }}</textarea>
                            @error('skill_desc')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Update</button>
                        <a class="btn btn-danger float-right mb-3 mr-2" href="{{ route('skill.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
