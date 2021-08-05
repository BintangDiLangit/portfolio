@section('title')
    Blog
@endsection
<x-app-layout>
    @push('head_script')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-bordered">
                    @if (Auth::user()->is_admin)
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Creator</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $blg)
                                <tr>
                                    <th scope="row"> {{ $loop->iteration }} </th>
                                    <td> {{ $blg->title }} </td>
                                    <td> {{ $blg->creator }} </td>
                                    <td>
                                        @foreach ($blg->tags as $bl)
                                            <span
                                                class="badge rounded-pill bg-warning text-dark">{{ $bl->tag_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit', ['blog' => $blg]) }}"
                                            class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{ route('blog.destroy', ['blog' => $blg]) }}" type="button"
                                            class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteConf{{ $blg->id }}"><i class="fa fa-trash"></i>
                                            Delete
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteConf{{ $blg->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteConfLabel">
                                                            Delete Blog</h5>
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
                                                        <form action="{{ route('blog.destroy', ['blog' => $blg]) }}"
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
                    @else
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Creator</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogUser as $blgU)
                                <tr>
                                    <th scope="row"> {{ $loop->iteration }} </th>
                                    <td> {{ $blgU->title }} </td>
                                    <td> {{ $blgU->creator }} </td>
                                    <td>
                                        @foreach ($blgU->tags as $bl)
                                            <span
                                                class="badge rounded-pill bg-warning text-dark">{{ $bl->tag_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit', ['blog' => $blgU]) }}"
                                            class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{ route('blog.destroy', ['blog' => $blgU]) }}" type="button"
                                            class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteConf{{ $blgU->id }}"><i class="fa fa-trash"></i>
                                            Delete
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteConf{{ $blgU->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteConfLabel">
                                                            Delete Blog</h5>
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
                                                        <form action="{{ route('blog.destroy', ['blog' => $blgU]) }}"
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

                    @endif
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
