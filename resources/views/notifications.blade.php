@extends('layouts/layout')

@section('content')

    <!-- Comments Approval Table -->
    <div class="mt-4 mx-4">
        <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
            <div class="sm:flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    Comments</p>

            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead class="">
                        <tr
                            class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Comment</th>
                            <th class="px-4 py-3">Action</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-center">

                        <?php $counter = $comments->perPage() * ($comments->currentPage() - 1) + 1; ?>
                        @foreach ($comments as $comment)
                            @if ($comment->status === 'Pending Approval')
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">

                                            <div>
                                                <p class="px-4 py-3 text-sm">{{ $counter++ }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $comment->author }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $comment->content }}
                                    </td>
                                    <td class="py-4 whitespace-no-wrap text-sm">
                                        <div class="flex justify-center space-x-2 text-xs pr-2">
                                            <a href="/dashboard/comment/{{ $comment->id }}/show"
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Accept </a>
                                            </a>
                                            <a href="/dashboard/comment/{{ $comment->id }}/remove"
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                Reject </a>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>



    <!-- Messages Table-->

    <div class="mt-4 mx-4">
        <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
            <div class="sm:flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    Messages</p>

            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead class="text-center">
                        <tr
                            class="text-xs font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Full Name</th>
                            <th class="px-4 py-3">Email Address</th>
                            <th class="px-4 py-3">Phone Number</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3 ml-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-center ">
                        <?php $counter = 1; ?>
                        @foreach ($messages as $message)
                            <tr
                                class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $counter++ }}</td>
                                <td class="px-4 py-3 text-sm">{{ $message->full_name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $message->email }}</td>
                                <td class="px-4 py-3 text-sm">{{ $message->phone }}</td>
                                <td class="px-4 py-3 text-sm">{{ $message->content }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                    <div class="flex space-x-4">
                                        <form action="/message/{{ $message->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <p>Delete</p>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
