@extends('layouts.app')

@section('content')
 <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg grid grid-cols-1">
        
        @auth
        <form action="{{ route('posts') }}" method="POST" class="mb-4">
            @csrf
            <! -- Text Area-->
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500" @enderror"
                placeholder="Make a Note here !!"></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm"> {{ $message }}</div>
                @enderror
            </div>

            <! -- Make a post button-->
            <button type="submit" class="right-0 bg-blue-500 text-white px-4 px-y2 rounded font-medium">Post</button>
        </form>
        @endauth    
        

        @if ($posts->count())
            @foreach ( $posts as $post )
                <x-post :post="$post" />
            @endforeach
            
            {{ $posts->links()  }}
        @else
            <p>There are no posts!</p>
        @endif
    </div>
 </div>
@endsection 