@extends('layouts/layout')


@section('content')


    <div class="py-12 ">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2
                class="bg-gradient-to-r from-green-400 to-blue-500 mb-9 text-3xl text-white w-1/3 mx-auto text-center rounded font-bold rounded">
                Add Category<h2>

                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        <div class="p-10 bg-white border border-gray-200">

                            <form method="POST" action="/category" class="text-sm" id="form" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="text-lg text-gray-600">Category Name <span
                                            class="text-red-500">*</span></label><br>
                                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title"
                                        value="" required>
                                </div>

                                <div class="flex justify-center m-4">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-green-400 to-blue-500 p-3 text-white hover:bg-blue-400 rounded w-56 font-bold"
                                        required>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>

    <script>
        function submitForm() {
            document.getElementById('form').submit()
        }
    </script>



@endsection
