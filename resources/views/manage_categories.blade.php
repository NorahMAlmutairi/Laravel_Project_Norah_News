@extends('layouts/layout')

@section('content')

    <div class="rounded-lg py-6 text-sm">

        <div class="block overflow-x-auto mx-16">

            <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">

                <div class="sm:flex items-center justify-between">
                    <p tabindex="0"
                        class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                        All Categories</p>
                    <div>
                        <button
                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <a href="/category/create" class="text-sm font-medium leading-none text-white"> + New
                                category</a>
                        </button>
                    </div>
                </div>
            </div>
            <table class="w-full text-center rounded-lg">
                <thead>
                    <tr class="text-gray-800 border border-b-0 ">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Category Name</th>
                        <th class="float-right py-3 mr-16">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = $categories->perPage() * ($categories->currentPage() - 1) + 1; ?>

                    @foreach ($categories as $category)
                        <form action="/category/{{ $category->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                <td class="px-4 py-4">{{ $counter++ }}</td>
                                <td id="content-{{ $category->id }}" class="px-4 py-4">{{ $category->name }}</td>
                                <td class="float-right mr-16 py-4 whitespace-no-wrap text-sm leading-5">
                                    <div class="flex space-x-4">
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <p>Delete</p>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-10">
                {{ $categories->links() }}
            </div>
        </div>
    </div>


@endsection
