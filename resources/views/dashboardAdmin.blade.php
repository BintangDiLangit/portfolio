@section('title')
    Dashboard Admin
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Portofolio</h5>
                                    <p class="card-text">{{ $portofolio }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Certificate</h5>
                                    <p class="card-text">{{ $certificate }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Feedback Client</h5>
                                    <p class="card-text">{{ $messages }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>
                                    <p class="card-text">
                                        <a href="{{ route('user.index') }}">Go!</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Skills</h5>
                                    <a href="{{ route('skill.index') }}">Go!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Feedback Client</h5>
                                    <p class="card-text">{{ $messages }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container m-4">
                    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Visitors</th>
                                    <th>Page Title</th>
                                    <th>Page Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($analyticsData1 as $data)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $data['date'] }}</td>
                                        <td>{{ $data['visitors'] }}</td>
                                        <td>{{ $data['pageTitle'] }}</td>
                                        <td>{{ $data['pageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
