@extends('layouts/layout')

@section('content')


    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                <h2 class="text-3xl font-semibold text-gray-800 leading-tight">
                    {{ $article->title }}
                </h2>
                <a href="/article/all?category[]={{ $article->category_id }}"
                    class="py-2 text-green-700 inline-flex items-center justify-center mb-2 opacity-75">
                    {{ $article->category->name }}
                </a>
            </div>

            <img src="/{{ $article->thumbnail }}" class="w-full object-cover lg:rounded" style="height: 15em;" />
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-12">

            <div class="px-4 lg:px-0 mt-12 text-gray-700 leading-relaxed w-full lg:w-3/4">
                {!! $article->content !!}
            </div>

            <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                <div class="p-4 border-t border-b md:border md:rounded">
                    <div class="flex py-2">
                        <div>
                            <p class="font-semibold text-gray-600 text-xs">
                                {{ Carbon\Carbon::parse($article->published_at)->diffForHumans() }}
                            </p>
                            <p class="font-semibold text-gray-700 text-sm">By {{ $article->user->name }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b-2 pb-10"> </div>
        <!-- comment form -->
        <div class="flex shadow-md mt-8 rounded-lg mb-4 max-w-xl bg-gray-100">

            <form method="POST" action="/article/{{ $article->id }}/comment"
                class="w-full max-w-xl rounded-lg px-4 pt-2 text-sm">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <input
                            class="rounded border border-gray-400 leading-normal py-2 px-4 font-medium placeholder-gray-700 focus:outline-none focus:bg-white mb-4"
                            name="author" placeholder='Name' required>

                        <textarea
                            class="rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                            name="content" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

                        </div>
                        <div class="-mr-1">
                            <input type='submit'
                                class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                value='Post Comment'>
                        </div>
                    </div>
            </form>
        </div>
        </div>

        <!--comment-->
        @foreach ($article->comments as $comment)
            @if ($comment->status === 'Visible')
                <div
                    class="bg-gray-100 rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-md mb-6 w-11/12">
                    <div class="flex flex-row justify-center mr-2">
                        <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"
                            src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                        <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->author }}
                        </h3>
                        <h5 class="text-gray-600 text-lg ml-2">{{ $comment->created_at->diffForHumans() }}</h5>
                    </div>


                    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $comment->content }}
                    </p>

                </div>
            @endif
        @endforeach
        <!--  comment end-->

    </main>



@endsection
