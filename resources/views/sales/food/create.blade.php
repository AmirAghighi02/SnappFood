@extends('layout.main')
{{--@dd($errors->all())--}}
@section('content')
    <!-- Food Add Component with Custom Styles -->
    <main class="bg-gray-900 mx-auto flex min-h-screen w-full items-center justify-center text-white">
        <a href="{{route('sales.dashboard')}}" class="fixed top-3 left-4"> <!-- Home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                <path fill="#db2777" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/>
            </svg>
        </a>
        <a href="{{route('sales.food.index')}}" class="fixed top-12 left-4"> <!-- index -->
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512">
                <path fill="none" stroke="#db2777" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                      d="M160 144h288M160 256h288M160 368h288"/>
                <circle cx="80" cy="144" r="16" fill="none" stroke="#db2777" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="32"/>
                <circle cx="80" cy="256" r="16" fill="none" stroke="#db2777" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="32"/>
                <circle cx="80" cy="368" r="16" fill="none" stroke="#db2777" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="32"/>
            </svg>
        </a>
        <section class="flex w-[30rem] flex-col space-y-6">
            <div class="text-center text-4xl font-medium text-white">Add Food</div>

            <!-- Form to add food -->
            <form action="{{route('sales.food.store')}}" method="post" class="space-y-6">
                @csrf
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="name" placeholder="Name"
                           class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('name') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <select class="js-example-basic-multiple w-full" name="materials[]" multiple="multiple" id="mySelect2">
                        @foreach($materials as $material)
                            <option class="text-black" value="{{$material->id}}">{{$material->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('materials') {{$message}} @enderror
                <div class="w-full border-b-2 text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" name="price" placeholder="Price"
                           class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none text-white">
                </div>
                @error('price') {{$message}} @enderror
                <div class="w-full  text-lg duration-300 focus-within:border-indigo-500">
                    <select id="countries" name="food_tier_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Tier</option>
                        @foreach($tiers as $tier)
                            <option value="{{$tier->id}}">{{$tier->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('food_tier_id') {{$message}} @enderror
                <div class="w-full">
                    <button type="submit"
                            class="w-full transform rounded-sm bg-pink-600 py-2 font-bold duration-300 hover:bg-pink-400">
                        Add Food
                    </button>
                </div>
            </form>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                tags: true,
                theme: "classic"
            });
        });
    </script>
    {{--    {{implode(" | ",$errors->all())}}--}}
@endsection
