@extends('layout.main')

@section('content')
    <main class="bg-blue-200 mx-auto flex min-h-screen w-full items-center justify-center text-white">
        <a href="{{route('admin.panel')}}" class="fixed top-4 left-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                <path fill="#1f2937" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/>
            </svg>
        </a>
        <section class="flex w-[30rem] flex-col space-y-6">
            <div class="text-center text-4xl font-medium text-black">Comments Delete Requests</div>
            <div class="w-full space-y-4 flex">

                @foreach($comments as $comment)
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col gap-2 w-80 ">
                        <p>{{$comment->content}}</p>
                        <form method="post" action="{{route('admin.comment.destroy',$comment)}}">
                            @csrf @method('delete')
                            <button class="button bg-red-500 text-white font-bold px-2 py-1 rounded-3xl" type="submit">delete comment</button>
                        </form>
                        <form method="post" action="{{route('admin.comment.cancel',$comment)}}">
                            @csrf
                            <button class="button bg-green-500 text-white font-bold px-2 py-1 rounded-3xl" type="submit">cancel request</button>
                        </form>
                    </div>
                @endforeach
            </div>
            @if($comments->isNotEmpty())
                {{$comments->links()}}
                <x-paginate/>
            @endif
        </section>
    </main>

@endsection
