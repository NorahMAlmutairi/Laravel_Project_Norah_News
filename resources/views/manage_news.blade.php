@extends('layouts/layout')

@section('content')

    <!-- News Table -->
    <div class="rounded-lg py-6 text-sm">

        <div class="block overflow-x-auto mx-16">

            <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">

                <div class="sm:flex items-center justify-between">
                    <p tabindex="0"
                        class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                        All News</p>
                    <div>
                        <button
                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <a href="/article/create" class="text-sm font-medium leading-none text-white"> + New
                                post</a>
                        </button>
                    </div>
                </div>
            </div>
            <table class="w-full text-left rounded-lg">
                <thead>
                    <tr class="text-gray-800 border border-b-0 text-center">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Author Name</th>
                        <th class="px-4 py-3">Date of Publish</th>
                        <th class="px-4 py-3">Action</th>
                        <th class="px-4 py-3">Number of Visitors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = $articles->perPage() * ($articles->currentPage() - 1) + 1; ?>

                    @foreach ($articles as $article)
                        <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                            <td class="px-4 py-4">{{ $counter++ }}</td>
                            <td class="px-4 py-4">{{ $article->title }}</td>
                            <td class="px-4 py-4">{{ $article->category->name }}</td>
                            <td class="px-4 py-4">{{ $article->user->name }}</td>
                            <td class="px-4 py-4">{{ $article->published_at }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                <div class="flex space-x-4">
                                    <a href="/article/{{ $article->id }}/edit" class="text-blue-500 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <p>Edit</p>
                                    </a>
                                    <form action="/article/{{ $article->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" value="{{ $article->id }}" name="id">
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <p>Delete</p>
                                        </button>
                                    </form>
                                    <a href="/article/{{ $article->id }}"
                                        class="text-green-500 hover:text-green-600 mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                            stroke="currentColor" class="bi bi-file-earmark-text ml-2" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        </svg>
                                        <p>View</p>
                                    </a>
                                </div>
                            </td>
                            <td class="text-center py-4">
                                <p>{{ $article->visits }}</span></p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        </div>
    </div>


@endsection
