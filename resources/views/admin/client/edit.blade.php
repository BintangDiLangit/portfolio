@section('title')
    Edit Feedback Client
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Message
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('client.update', $client) }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="name" value="{{ $client->name }}">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Message</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="message" name="clientMessage" value="{{ $client->clientMessage }}">
                            @error('clientMessage')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Photo</label>
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <img src="{{ env('AWS_URL') . '/' . env('AWS_BUCKET') . '/storage/client-images/' . $client->photo }}"
                                class="rounded mx-auto d-block" style="width: 300px" alt="...">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="photo"
                                        onchange="readURL(this);" accept="image/*" />
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
