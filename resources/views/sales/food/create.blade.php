@extends('layout.main')
{{--@dd($errors->all())--}}
@section('content')
    <!-- Food Add Component with Custom Styles -->
    <main class="bg-gray-900 mx-auto flex min-h-screen w-full items-center justify-center text-white">
        <section class="flex w-[30rem] flex-col space-y-6">
            <div class="text-center text-4xl font-medium text-white">Add Food</div>

            <!-- Form to add food -->
            <form action="{{route('sales.food.store')}}" method="post" class="space-y-6">
                @csrf
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="name" placeholder="Name" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('name') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="materials" placeholder="Material" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('materials') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="price" placeholder="Price" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('price') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="food_tier_id" placeholder="Food Tier ID" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('food_tier_id') {{$message}} @enderror
                <div class="w-full">
                    <button type="submit" class="w-full transform rounded-sm bg-pink-600 py-2 font-bold duration-300 hover:bg-pink-400"> Add Food </button>
                </div>
            </form>
        </section>
    </main>
{{--    {{implode(" | ",$errors->all())}}--}}
@endsection
