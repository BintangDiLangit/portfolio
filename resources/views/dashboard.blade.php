@section('title')
    Dashboard
@endsection
<x-app-layout>
    @push('head_script')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container m-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <canvas id="myChart" width="300" height="300"></canvas>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-3 border-0" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                            <p class="card-text">{{ Auth::user()->bio }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span
                                            class="badge rounded-pill bg-primary mb-3 fs-5 text-center">{{ $achievement }}</span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            @for ($i = 0; $i < $star; $i++)
                                                <img width="50px" class="rounded float-start mr-3"
                                                    src="{{ asset('appreciation/rank/favourites.png') }}" alt="">
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('bot_script')
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            const data = {
                labels: [
                    'All Blog',
                    'Your Blogs',
                    'All Tags',
                    // 'Grey',
                    // 'Blue'
                ],
                datasets: [{
                    label: 'Recap Blog',
                    data: [{{ $blogAll }}, {{ $blogUser }}, {{ $tags }}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]
                }]
            };
            var myChart = new Chart(ctx, {
                type: 'polarArea',
                data: data,
                options: {}
            });
        </script>

    @endpush
</x-app-layout>
