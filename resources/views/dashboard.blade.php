@extends('layouts/layout')

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-8">

                <!-- Cards -->
                <div class="grid grid-cols-12 gap-6 mt-5 text-sm">
                    <a class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                                    class="h-9 w-9 text-blue-600" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $articlesCount }}</div>

                                    <div class="mt-1 text-base text-gray-600">Total news</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                                    class="h-9 w-9 text-yellow-400" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $visitsCount }}</div>

                                    <div class="mt-1 text-base text-gray-600">Total visitors</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                                    class="h-9 w-9 text-pink-600" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $commentsCount }}</div>

                                    <div class="mt-1 text-base text-gray-600">Total comments</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                                    class="h-9 w-9 text-green-400" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                                    <path
                                        d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $categoriesCount }}</div>

                                    <div class="mt-1 text-base text-gray-600">Total categories</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mt-10"></div>

                <!-- Charts -->
                <div class="rounded-lg py-6 text-sm ">
                    <div class="block overflow-y-auto mx-2">
                        <div class="px-4 md:px-4 py-4 md:py-2 bg-gray-100 rounded-lg">
                            <div
                                class="grid gap-10 grid-cols-1 lg:grid-cols-2 px-4 md:px-2 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg relative z-0">
                                <div class="bg-white shadow-lg rounded p-1 pt-10" id="chartpie"></div>
                                <div class="bg-white shadow-lg rounded p-2" id="chartbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function deleteNews(id) {
            axios.delete(`/article/${id}`).then(() => location.reload()).catch(err => console.log(err));
        }
    </script>

    <script>
        var chart = document.querySelector('#chartbar')
        var options = {
            series: [{
                name: 'Comments',
                data: {!! $commentsStatuses !!}.map(i =>
                    i.count)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: {!! $commentsStatuses !!}.map(i =>
                    i.status),
            }
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>

    <script>
        var chart = document.querySelector('#chartpie')
        var options = {
            series: {!! $categoriesStatistics !!}.map(i =>
                i.count),
            labels: {!! $categoriesStatistics !!}.map(i =>
                i.category),
            chart: {
                height: 350,
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function(w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                }
                            }
                        }
                    }
                }
            }
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>


@endsection
