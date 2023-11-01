@extends('layout.main')

@section('content')
    <!-- Food Show Page with Full-Screen Details -->
    <main class="min-h-screen bg-gray-900 text-white flex items-center justify-center">
        <section class="w-full h-screen flex items-center justify-center">
            <!-- Food Details -->
            <div class="bg-gray-800 p-8 rounded-lg text-center">
                <div class="text-4xl font-semibold mb-4">Food Name</div>
                <p class="text-gray-400">Material: Food Material</p>
                <p class="text-gray-400">Price: $10.99</p>
                <p class="text-gray-400">Category: Category Name</p>

                <!-- Edit Link with SVG -->
                <a href="edit_food.html" class="flex items-center justify-end text-indigo-500 hover:text-indigo-400 mt-4">
                    Edit
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </section>
    </main>


@endsection
