@extends('layouts/layout')

@section('content')

    <!-- recent posts -->

    <h1 class="text-3xl font-medium">All News</h2>
        <div>
            <!-- search -->
            <div class="flex justify-end space-x-2 mb-8 mx-auto text-gray-600 ">
                <form method="GET" action="/article/all" id="form">
                    @csrf
                    <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="text" name="search" placeholder="Search">
                </form>
                <button type="submit"
                    class="border-2 border-gray-300 px-3 bg-white rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                    <svg onclick="document.getElementById('form').submit()" class="text-gray-600 h-4 w-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>

                <div class="relative inline-block text-left">
                    <div>
                        <button onclick="showFilter()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                            id="options-menu" aria-haspopup="true" aria-expanded="true ">
                            Filter
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-filter" viewBox="0 0 16 16">
                                <path
                                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>
                    </div>

                    <div id="filterOptions"
                        class="flex flex-col space-y-2 text-sm hidden absolute right-0 top-10 w-90 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-6">

                        <form action="/article/all" method="GET">
                            @csrf
                            <div class="flex flex-col">
                                <label for="adv-search">Search (title, content, author)</label>
                                <input name="adv-search" id="adv-search" class="mb-4 border-2">

                                <label for="category[]">Category</label>
                                <select class="mb-4 border-2" name="category[]" id="category" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <label for="from">From:</label>
                            <input class="border-2" type="date" name="from" id="from">

                            <br>

                            <label for="to">To:</label>
                            <input class="border-2" type="date" name="to" id="to">

                            <button type="submit"
                                class="float-right border-2 bg-gray-800 text-white rounded-lg px-2 py-1">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="block space-x-0 grid xl:grid-cols-3 lg:grid-cols-2 sm:grid-cols-1 gap-4 w-full">
            @foreach ($articles as $article)
                <div class="rounded w-full border bg-gray-100 p-5">
                    <a href="/article/{{ $article->id }}"><img src="/{{ $article->thumbnail }}"
                            class="rounded w-full" /></a>
                    <div class="p-4 pl-0">
                        <a href="/article/{{ $article->id }}">
                            <h2 class="font-bold text-xl text-gray-800">{{ $article->title }}</h2>
                        </a>
                        <p class="text-gray-700 mt-2 text-sm">
                            {{ strlen(strip_tags($article->content)) > 200 ? substr(strip_tags($article->content), 0, 200) : strip_tags($article->content) }}
                        </p>

                        <a href="/article/{{ $article->id }}"
                            class="inline-block py-2 rounded text-green-900 mt-2 ml-auto text-base">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $articles->links() }}
        </div>
        <!-- end recent posts -->

        <script>
            function showFilter() {
                var targetDiv = document.getElementById("filterOptions");

                if (targetDiv.style.display === "none") {
                    targetDiv.style.display = "block";
                } else {
                    targetDiv.style.display = "none";
                }
            };
        </script>
    @endsection
