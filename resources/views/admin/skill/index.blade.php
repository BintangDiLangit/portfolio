@section('title')
    Skill
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Skills
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('skill.create') }}" class="btn btn-primary">Add Skill</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td> {{ $skill->skill_name }} </td>
                                <td> {{ $skill->updated_at }} </td>
                                <td>
                                    <img style="width: 100px"
                                        src="{{ env('AWS_URL') . '/storage/skill-images/' . $skill->skill_img }}">
                                </td>
                                <td> {{ $skill->skill_desc }} </td>
                                <td>
                                    <a href="{{ route('skill.edit', ['skill' => $skill]) }}" class="btn btn-primary"><i
                                            class="fa fa-pencil"></i> Edit </a>
                                    <a href="{{ route('skill.destroy', ['skill' => $skill]) }}" type="button"
                                        class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteConf{{ $skill->id }}"><i class="fa fa-trash"></i>
                                        Delete
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteConf{{ $skill->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteConfLabel">
                                                        Delete Skill</h5>
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
                                                    <form action="{{ route('skill.destroy', ['skill' => $skill]) }}"
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
