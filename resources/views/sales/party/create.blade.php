@extends('layout.main')
{{--@dd($errors->all())--}}
@section('content')
    <main class="bg-gray-900 mx-auto flex min-h-screen w-full items-center justify-center text-white">
        <a href="{{route('sales.dashboard')}}" class="fixed top-3 left-4" > <!-- Home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#db2777" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/></svg>
        </a>
        <a href="{{route('sales.food.index')}}" class="fixed top-12 left-4" > <!-- index -->
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><path fill="none" stroke="#db2777" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M160 144h288M160 256h288M160 368h288"/><circle cx="80" cy="144" r="16" fill="none" stroke="#db2777" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="80" cy="256" r="16" fill="none" stroke="#db2777" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="80" cy="368" r="16" fill="none" stroke="#db2777" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
        </a>
        <section class="flex w-[30rem] flex-col space-y-6">
            <div class="text-center text-4xl font-medium text-white">Add {{$food->name}} to Party</div>

            <form action="{{route('sales.party.store',$food)}}" method="post" class="space-y-6">
                @csrf
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="number" name="count" placeholder="Count" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('count') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="number" name="percent" placeholder="Percent Off" class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('percent') {{$message}} @enderror
                <div class="w-full">
                    <button type="submit" class="w-full transform rounded-sm bg-pink-600 py-2 font-bold duration-300 hover:bg-pink-400">
                        Add Food Party </button>
                </div>
            </form>
        </section>
    </main>
    {{--    {{implode(" | ",$errors->all())}}--}}
@endsection
