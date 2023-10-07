@section('title')
    Edit Certificate
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Certificate
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('certificate.update', $cert) }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Certificate</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="name" value="{{ $cert->name }}">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Certificate <span
                                    class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="paste link here" name="linkCert" value="{{ $cert->linkCert }}">
                            @error('linkCert')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Certificate Type <span></label>
                            <select name="type" id="" class="form-control">
                                @if ($cert->type == 'softskill')
                                    <option value="">Choose Type</option>
                                    <option value="security">Security</option>
                                    <option value="software">Software</option>
                                    <option selected value="softskill">Softskill</option>
                                @elseif ($cert->type == 'security')
                                    <option value="">Choose Type</option>
                                    <option selected value="security">Security</option>
                                    <option value="software">Software</option>
                                    <option value="softskill">Softskill</option>
                                @elseif ($cert->type == 'software')
                                    <option value="">Choose Type</option>
                                    <option value="security">Security</option>
                                    <option selected value="software">Software</option>
                                    <option value="softskill">Softskill</option>
                                @else
                                    <option selected value="">Choose Type</option>
                                    <option value="security">Security</option>
                                    <option value="software">Software</option>
                                    <option value="softskill">Softskill</option>
                                @endif

                            </select>
                            @error('type')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Certificate</label>
                            @error('imgCert')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <img src="{{ env('IMAGE_URL') . '/storage/certificate-images/' . $cert->imgCert }}"
                                class="rounded mx-auto d-block" style="width: 300px" alt="...">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="imgCert"
                                        onchange="readURL(this);" accept="image/*" value="{{ $cert->name }}" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                            <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                        <a class="btn btn-danger float-right mb-3 mr-2"
                            href="{{ route('certificate.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
