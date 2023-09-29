@section('title')
    CV
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CV
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container m-4">
                    <form action="{{ route('cv.store') }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            @error('file')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Upload
                                    CV</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="file"
                                        onchange="readURL(this);" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file (.pdf)</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your cv" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                            <span class="image-title">Uploaded File</span></button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right mb-3">Update CV</button>
                        </div>
                    </form>
                </div>

                <div class="container m-4">
                    <iframe src="{{ env('AWS_URL') . '/storage/file-cv/' . $cv->path }}"
                        style="width: 100%;height: 1000px;border: none;">CV</iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('cv')
    <script src="{{ asset('../js/upcv.js') }}"></script>
@endpush
