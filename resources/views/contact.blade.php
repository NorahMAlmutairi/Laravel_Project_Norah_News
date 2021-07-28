@extends('layouts/layout')

@section('content')

    <div class="flex items-center min-h-screen">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-xl">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Contact Us</h1>
                    <p class="text-gray-400 dark:text-gray-400 text-sm">Fill up the form below to send us a message.</p>
                </div>
                <div class="m-7">
                    <form action="/message" method="POST" id="form">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Full Name</label>
                            <input type="text" name="full_name" id="name" placeholder="John Doe" required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 text-sm" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email
                                Address</label>
                            <input type="email" name="email" id="email" placeholder="you@company.com" required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 text-sm" />
                        </div>
                        <div class="mb-6">

                            <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Phone Number</label>
                            <input type="text" name="phone" id="phone" placeholder="+966 53 435 6677" required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 text-sm" />
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Your
                                Message</label>

                            <textarea rows="5" name="content" id="message" placeholder="Your Message"
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 text-sm"
                                required></textarea>
                        </div>
                        <div class="mb-6 flex justify-center">
                            <button type="submit"
                                class="bg-gradient-to-r from-green-400 to-blue-500 p-3 text-white hover:bg-blue-400 rounded w-56 font-bold">Send
                                Message</button>
                        </div>
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
