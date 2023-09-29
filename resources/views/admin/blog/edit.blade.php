@section('title')
    Edit Blog
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
<x-app-layout>
    @push('head_script')
        <script src="https://cdn.tiny.cloud/1/oa8jmz8jvqz4wjrgj18i7em5pbidibl49aqwfx0lii7m4tuc/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('blog.update', $blog) }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title<span class="text-secondary"> (Special characters
                                    are not allowed)</span></label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                                placeholder="title" value="{{ $blog->title }}">
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image Header</label>
                            @error('imageHeader')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <img src="{{ env('AWS_ENDPOINT') . '/' . env('AWS_BUCKET') . '/storage/blog-images/' . $blog->imageHeader }}"
                                class="rounded mx-auto d-block" style="width: 300px" alt="...">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Change
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="imageHeader"
                                        onchange="readURL(this);" accept="image/*" value="{{ $blog->name }}" />
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
                        <div class="form-group">
                            <h4>Block Content *</h4>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-secondary text-white">
                                            <i class="fa fa-picture-o"></i> Insert Image
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">

                                <textarea id="block_content" name="content" rows="10" cols="80" style="width: 100%">{!! old('content', $blog->content ?? '') !!}</textarea>
                                @if ($errors->has('block_content'))
                                    <span class="form-feedback">{{ $errors->first('block_content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($blog->tags() == null)
                                <label for="exampleFormControlInput1">No Tags</label>
                            @else
                                @foreach ($blog->tags as $bl)
                                    <label for="exampleFormControlInput1">[{{ $bl->tag_name }}]</label>
                                @endforeach
                            @endif

                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Update</button>
                        <a class="btn btn-danger float-right mb-3 mr-2" href="{{ route('blog.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('bot_script')
        <script src="{{ url('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script>
            $(function() {
                $('.select2multiple').select2({
                    theme: 'bootstrap4',
                    tags: true
                });
            });

            $(document).ready(function() {
                var route_prefix = '{{ url('/filemanager') }}';
                $('#lfm').filemanager('image', {
                    prefix: route_prefix
                });

                $('#thumbnail').change(function() {

                    var cursorPos = $('#block_content').prop('selectionStart');
                    var v = $('#block_content').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);

                    console.log(textBefore + '<img src="' + $(this).val() + '" />' + textAfter);

                    // Get the TinyMCE editor object.
                    const editor = tinymce.get('block_content');

                    // Insert the value "Hello world!" into the editor at the current cursor position.
                    editor.execCommand('mceInsertContent', false, '<img src="' + $(this).val() + '" />', {
                        insertAt: 'cursor'
                    });

                    // $('#block_content').val(textBefore + '<img src="' + $(this).val() + '" />' + textAfter);
                });
            });
        </script>

        <script>
            var editor_config = {
                path_absolute: "/",
                selector: "#block_content",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,

                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function() {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            };

            tinymce.init(editor_config);
        </script>
    @endpush
</x-app-layout>
