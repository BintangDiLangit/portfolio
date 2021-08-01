<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Certificate
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Certificate Name</th>
                            <th scope="col">Credential Link</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $cert)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td> {{ $cert->name }} </td>
                                <td>
                                    @if ($cert->linkCert != 0)
                                        <a href="{{ $cert->linkCert }}" class="badge badge-info">Link</a>
                                    @else
                                        <p class="text-danger">Credential Link Not Found</p>
                                    @endif
                                </td>
                                <td>
                                    <img style="width: 100px"
                                        src="{{ asset('../certificate-images/' . $cert->imgCert) }}">
                                </td>
                                <td>
                                    <a href="{{ route('certificate.edit', ['certificate' => $cert]) }}"
                                        class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="{{ route('certificate.destroy', ['certificate' => $cert]) }}"
                                        type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteConf{{ $cert->id }}"><i class="fa fa-trash"></i>
                                        Delete
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteConf{{ $cert->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteConfLabel">
                                                        Delete Certificate</h5>
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
                                                        action="{{ route('certificate.destroy', ['certificate' => $cert]) }}"
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
