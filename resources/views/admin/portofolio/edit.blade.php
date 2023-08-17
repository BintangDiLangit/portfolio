@section('title')
    Edit Portofolio
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Portofolio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <form action="{{ route('portofolio.update', $porto) }}" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title Portofolio</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                                placeholder="title" value="{{ $porto->title }}">
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rating <span class="text-danger">*</span></label>
                            <input type="number" name="rating" class="form-control" id="exampleFormControlInput1"
                                placeholder="rating" value="{{ $porto->rating }}">
                            @error('rating')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Client <span class="text-danger">*</span></label>
                            <input type="text" name="client" class="form-control" id="exampleFormControlInput1"
                                placeholder="client" value="{{ $porto->client }}">
                            @error('client')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Completed Status <span class="text-muted">(leave it
                                    blank if it's still development stage)</span></label>
                            <input type="date" name="completed" class="form-control" id="exampleFormControlInput1"
                                value="{{ $porto->completed }}">
                            @error('completed')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Upload Image</label>
                            <img src="{{ env('AWS_ENDPOINT') . '/' . env('AWS_BUCKET') . '/storage/portofolio-images/' . $porto->image }}"
                                class="rounded mx-auto d-block" style="width: 300px" alt="...">
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">

                            @error('image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Portofolio</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="paste link here" name="linkPorto" value="{{ $porto->linkPorto }}">
                            @error('linkPorto')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description portofolio"
                                name="description">{{ $porto->description }}</textarea>
                            @error('description')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Additional Description <span
                                    class="text-muted">(Optional)</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="additional description"
                                name="additional_description">{{ $porto->additional_description }}</textarea>
                            @error('additional_description')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
                        <a class="btn btn-danger float-right mb-3 mr-2"
                            href="{{ route('portofolio.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
