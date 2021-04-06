@extends('layouts.app')

@section('content')
 <div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-3xl  font-medium mb-1">{{ $user->name}}</h1>
            <p>Posted {{ $posts->count() }} {{ Str::plural('Note',$posts->count())}}</p>
            <p>Has {{ $user->recievedLikes->count() }} {{ Str::plural('Like',$user->recievedLikes->count())}}</p>
        </div>
        <div class="bg-white p-6 rounded-lg">
            @if ($posts->count())
            @foreach ( $posts as $post )
                <x-post :post="$post" />
            @endforeach
        
            {{ $posts->links()  }}
        @else
            <p>There are no notes for $user->name!</p>
        @endif
        </div>
    </div>
 </div>
@endsection 