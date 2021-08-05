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
                                        <button type="button" class="btn btn-dark position-relative mb-2">
                                            {{ $achievement }} <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="position-absolute top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill"
                                                fill="#212529" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                            </svg>
                                        </button>
                                        <img src="{{ Auth::user()->profile_photo_url }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                            <p class="card-text">{{ Auth::user()->bio }}</p>
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
