@extends('layouts/layout')

@section('content')
    <main class="mt-0">

        <!-- featured section -->
        <div class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">

            <!-- main post -->
            <div class="w-full md:w-4/7 absoulte rounded block border bg-gray-100 p-5 m-5 mb-0">
                <a href="/article/{{ $articles[0]->id }}">
                    <img src="{{ $articles[0]->thumbnail }}" class="rounded-md object-cover w-full h-64">
                </a>
                <a href="/article/all?category[]={{ $articles[0]->category_id }}">
                    <span class="text-green-700 text-sm hidden md:block mt-4"> {{ $articles[0]->category->name }} </span>
                </a>
                <h1 class="text-gray-800 text-2xl font-bold mt-2 mb-2 leading-tight">
                    <a href="/article/{{ $articles[0]->id }}">{{ $articles[0]->title }}</a>
                </h1>
                <p class="text-gray-600 mb-4 text-sm">
                    {{ strlen(strip_tags($articles[0]->content)) > 600 ? substr(strip_tags($articles[0]->content), 0, 600) . '...' : strip_tags($articles[0]->content) }}
                </p>
                <a href="/article/{{ $articles[0]->id }}"
                    class="inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100 text-sm">
                    Read more
                </a>
            </div>




            <!-- recent posts -->
            <div class="flex mt-16 mb-4 px-5 lg:px-0 items-center justify-between ">
                <h2 class="font-bold text-1xl px-3">Latest news</h2>
                <a href="/article/all"
                    class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer text-sm">
                    View all
                </a>
            </div>
            <div class="block space-x-0 grid xl:grid-cols-3 lg:grid-cols-2 sm:grid-cols-1 gap-4 w-full">
                @for ($i = 1; $i < $articles->count(); $i++)
                    <div class="rounded border bg-gray-100 p-5">
                        <a href="/article/{{ $articles[$i]->id }}">
                            <img src="{{ $articles[$i]->thumbnail }}" class="rounded" width="100%" />
                        </a>
                        <div class="p-4 pl-0">
                            <a href="/article/{{ $articles[$i]->id }}">
                                <h2 class="font-bold text-xl text-gray-800">
                                    {{ strlen($articles[$i]->title) > 130 ? substr($articles[$i]->title, 0, 130) . '...' : $articles[$i]->title }}
                                </h2>
                            </a>
                            <p class="text-gray-700 mt-2 text-sm">
                                {{ strlen(strip_tags($articles[$i]->content)) > 300 ? substr(strip_tags($articles[$i]->content), 0, 300) . '...' : strip_tags($articles[$i]->content) }}
                            </p>

                            <a href="article/{{ $articles[$i]->id }}"
                                class="inline-block py-2 rounded text-green-900 mt-2 ml-auto text-base"> Read more
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
            <!-- end recent posts -->



    </main>
    <!-- main ends here -->
@endsection
