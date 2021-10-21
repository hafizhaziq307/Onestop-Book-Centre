@extends('layouts.layout')

@section('content')

    @php
    use App\Models\Order;
    @endphp

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    @if (session('roles') != 'seller')
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.seller-nav />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-seller active="dashboard" />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="Dashboard" />

            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2 space-y-4">
                    <!-- Status orders -->
                    <section class="grid grid-cols-3 gap-3">
                        <div
                            class="rounded-lg flex items-center justify-between py-2 px-5 bg-gradient-to-br from-blue-600 to-purple-500 ">
                            <div class="space-y-2">
                                <div class="text-4xl">{{ $orderShip }}</div>
                                <p class="capitalize">to ship</p>
                            </div>
                            <svg class="w-10 h-10 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="bg-yellow-600 rounded-lg flex items-center justify-between py-2 px-5 bg-gradient-to-br from-green-600 to-blue-500">
                            <div class="space-y-2">
                                <div class="text-4xl">{{ $orderReceive }}</div>
                                <p class="capitalize">Shipping</p>
                            </div>
                            <x-icons.truck class="w-10 h-10" />
                        </div>
                        <div
                            class="bg-green-600 rounded-lg flex items-center justify-between py-2 px-5 bg-gradient-to-br from-yellow-600 to-red-400">
                            <div class="space-y-2">
                                <div class="text-4xl">{{ $orderComplete }}</div>
                                <p class="capitalize">Completed</p>
                            </div>
                            <x-icons.check class="w-10 h-10" />
                        </div>
                    </section>
                    <!-- Chart -->
                    <section class="max-w-6xl mx-auto gap-4 bg-gray-900">
                        <canvas id="myChart"></canvas>
                    </section>
                </div>
                <!-- Bestselling container -->
                <section class="space-y-7 bg-gray-900 rounded-lg h-96 p-4">
                    <p class="text-xl font-bold">Bestselling Products</p>

                    <div class="space-y-3">
                        @forelse ($bestsellingBooks as $bestsellingBook)
                            <div class="flex space-x-3">
                                <p class="self-center">{{ $loop->iteration }}</p>
                                <img src="{{ asset('uploads/book/' . $bestsellingBook->gambarBuku) }}"
                                    class="w-16 rounded-md">
                                <div>
                                    <p>{{ $bestsellingBook->tajukBuku }}</p>
                                    <p>{{ $bestsellingBook->hargaBuku }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-800 grid place-items-center h-20 rounded-lg text-lg">
                                <p>No Book has been sold yet</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        var xValues = <?php echo json_encode($xValues); ?>;
        var xyValues = [10, 30, 54, 22, 77, 44, 55, 66];
        new Chart("myChart", {

            type: "line",

            data: {
                labels: xValues,
                backgroundColor: "#ffffff",
                color: "#10B981",
                datasets: [{
                    label: "Order",
                    borderColor: "#10B981",
                    lineTension: 0,
                    color: "#10B981",
                    data: xyValues,
                    fill: false,
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            fontSize: 14
                        }
                    }],
                    yAxes: [{
                        gridLines: false,
                        ticks: {
                            fontColor: "white",
                            fontSize: 14
                        }
                    }]
                }
            }
        });
    </script>
@endsection
