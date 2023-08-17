@section('title')
    Competition
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Competition
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Button trigger modal -->

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#competitionModal">
                    Add Competition
                </button>

                <div class="modal fade" id="competitionModal" tabindex="-1" role="dialog"
                    aria-labelledby="competitionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="competitionModalLabel">Add Competition</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('competition.store') }}" method="post" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title Competition <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date Competition <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date" class="form-control" id=""
                                            placeholder="date" value="{{ old('date') }}">
                                        @error('date')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Upload Image <span class="text-danger">*</span></label>
                                        <input name="image" type="file" class="form-control-file"
                                            id="exampleFormControlFile1">
                                        @error('image')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="desc" rows="3" placeholder="description competition" name="desc">{{ old('desc') }}</textarea>
                                        @error('desc')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="url" name="link" class="form-control" id="link"
                                            placeholder="link" value="{{ old('link') }}">
                                        @error('link')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date Competition</th>
                            <th scope="col">Image</th>
                            <th scope="col">Link</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitions as $comp)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td> {{ $comp->title }} </td>
                                <td> {{ $comp->date }} </td>
                                <td>
                                    <a href="{{ $comp->link }}" class="badge badge-info">Link</a>
                                </td>
                                <td>
                                    <img style="width: 250px"
                                        src="{{ env('AWS_ENDPOINT') . '/' . env('AWS_BUCKET') . '/storage/competition-images/' . $comp->image }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#editCompetitionModal{{ $comp->id }}">
                                        Edit
                                    </button>

                                    <div class="modal fade" id="editCompetitionModal{{ $comp->id }}"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="editCompetitionModalLabel{{ $comp->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="editCompetitionModalLabel{{ $comp->id }}">Add
                                                        Competition
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('competition.update', ['competition' => $comp]) }}"
                                                    method="post" data-parsley-validate
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="title">Title Competition <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="title" class="form-control"
                                                                id="title" placeholder="title"
                                                                value="{{ $comp->title }}">
                                                            @error('title')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Date Competition <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="date" class="form-control"
                                                                id="" placeholder="date"
                                                                value="{{ $comp->date }}">
                                                            @error('date')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Upload Image</label>
                                                            <input name="image" type="file"
                                                                class="form-control-file"
                                                                id="exampleFormControlFile1">
                                                            @error('image')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="desc">Description <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="desc" rows="3" placeholder="description competition" name="desc">{{ $comp->desc }}</textarea>
                                                            @error('desc')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="link">Link</label>
                                                            <input type="url" name="link" class="form-control"
                                                                id="link" placeholder="link"
                                                                value="{{ $comp->link }}">
                                                            @error('link')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('competition.destroy', ['competition' => $comp]) }}"
                                        type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteConf{{ $comp->id }}"><i class="fa fa-trash"></i>
                                        Delete
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteConf{{ $comp->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteConfLabel">
                                                        Delete Competition</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-link" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <form
                                                        action="{{ route('competition.destroy', ['competition' => $comp]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
