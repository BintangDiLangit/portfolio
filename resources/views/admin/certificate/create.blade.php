@section('title')
    Add Certificate
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Certificate
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('certificate.store') }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Certificate</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="name" value="{{ old('name') }}">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Certificate <span
                                    class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="paste link here" name="linkCert" value="{{ old('linkCert') }}">
                            @error('linkCert') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Certificate Type <span></label>
                            <select name="type" id="" class="form-control">
                                <option value="">Choose Type</option>
                                <option value="security">Security</option>
                                <option value="software">Software</option>
                                <option value="softskill">Softskill</option>
                            </select>
                            @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Certificate</label>
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="imgCert"
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
