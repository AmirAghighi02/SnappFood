@extends('layout.main')

@section('content')
    <main class="bg-gray-900 mx-auto flex min-h-screen w-full items-center justify-center text-white">
        <section class="flex w-[30rem] flex-col space-y-6">
            <div class="text-center text-4xl font-medium text-white">Add Food Tier</div>

            <form action="{{route('admin.food.store')}}" method="post" class="space-y-6">
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="name" placeholder="Name" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                <div class="w-full">
                    <button type="submit" class="w-full transform rounded-sm bg-pink-600 py-2 font-bold duration-300 hover:bg-pink-400"> Add Food </button>
                </div>
            </form>
        </section>
    </main>
@endsection
