@extends('layouts/layout')

@section('content')

    <!-- Comment Table -->
    <div class="mt-4 mx-4">
        <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
            <div class="sm:flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    All Comments</p>

            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-center">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Comment</th>
                            <th class="px-4 py-3">Action</th>
                            <th class="px-4 py-3">Visibility</th>


                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 ">

                        {{-- {{ ddd($comments) }} --}}
                        <?php $counter = $comments->perPage() * ($comments->currentPage() - 1) + 1; ?>
                        @foreach ($comments as $comment)
                            <form action="/article/{{ $comment->article_id }}/comment/{{ $comment->id }}" method="POST">
                                @method('PUT')
                                @csrf
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
                                    <td class="px-4 py-3 text-sm" id="content-{{ $comment->id }}">
                                        {{ $comment->content }}
                                    </td>
                                    <td hidden class="px-4 py-3 text-sm" id="editor-{{ $comment->id }}">
                                        <textarea name="content" id="textarea-{{ $comment->id }}" style="width:100%"
                                            rows="10">{{ $comment->content }}</textarea>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                        <div class="flex space-x-4">
                                            <button type="button" id="edit-{{ $comment->id }}"
                                                onclick="toggleEditor({{ $comment->id }})"
                                                class="text-blue-500 hover:text-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <p>Edit</p>
                                            </button>
                                            <button hidden type="submit" id="save-{{ $comment->id }}"
                                                class="text-green-500 hover:text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                </svg>
                                                <p>Save</p>
                                            </button>
                                            <a href="/dashboard/comment/{{ $comment->id }}/remove"
                                                class="text-red-500 hover:text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <p>Delete</p>
                                            </a>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                        <div class="flex space-x-4">
                                            @if ($comment->status === 'Hidden')

                                                <a href="/dashboard/comment/{{ $comment->id }}/show"
                                                    class="text-gray-500 hover:text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg>
                                                    <p>Show</p>
                                                </a>
                                            @elseif ($comment->status === 'Visible')

                                                <a href="/dashboard/comment/{{ $comment->id }}/hide"
                                                    class="text-gray-500 hover:text-gray-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye-slash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                                        <path
                                                            d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                                                    </svg>
                                                    <p>Hide</p>
                                                </a>
                                            @endif

                                        </div>
                                    </td>

                                </tr>
                            </form>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="mt-10">
                {{ $comments->links() }}
            </div>
        </div>
    </div>

    <!-- End of Comment Table -->

    <script>
        function toggleEditor(item) {
            document.getElementById(`content-${item}`).hidden = !document.getElementById(`content-${item}`).hidden;
            document.getElementById(`editor-${item}`).hidden = !document.getElementById(`editor-${item}`).hidden;
            document.getElementById(`save-${item}`).hidden = !document.getElementById(`save-${item}`).hidden;
            document.getElementById(`edit-${item}`).hidden = !document.getElementById(`edit-${item}`).hidden;
        }
    </script>

@endsection
