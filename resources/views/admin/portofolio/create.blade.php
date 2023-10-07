@section('title')
    Create Portofolio
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Portofolio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('portofolio.store') }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Portofolio <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                                placeholder="title" value="{{ old('title') }}">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rating <span class="text-danger">*</span></label>
                            <input type="number" name="rating" class="form-control" id="exampleFormControlInput1"
                                placeholder="rating" value="{{ old('rating') }}">
                            @error('rating') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Client <span class="text-danger">*</span></label>
                            <input type="text" name="client" class="form-control" id="exampleFormControlInput1"
                                placeholder="client" value="{{ old('client') }}">
                            @error('client') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Completed Status <span class="text-muted">(leave it
                                    blank if it's still development stage)</span></label>
                            <input type="date" name="completed" class="form-control" id="exampleFormControlInput1"
                                value="{{ old('completed') }}">
                            @error('completed') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image <span
                                    class="text-danger">*</span></label>
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                            @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Portofolio <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="paste link here" name="linkPorto" value="{{ old('linkPorto') }}">
                            @error('linkPorto') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="description portofolio"
                                name="description">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Additional Description <span
                                    class="text-muted">(Optional)</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="additional description"
                                name="additional_description">{{ old('additional_description') }}</textarea>
                            @error('additional_description') <span
                                class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
