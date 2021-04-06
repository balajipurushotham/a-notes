@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->body  }}</p>
    
    <div class="grid grid-cols-3  flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('post.likes', $post)}}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('post.likes', $post)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        
        <span class="place-self-center">{{ $post->likes->count() }} {{ Str::plural('Like',$post->likes->count())}} </span>
        
        @if ($post->ownedBy(auth()->user()))
            <form action=" {{ route('posts.destroy',$post)}}" method="POST" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-300 text-white px-4 px-y2 rounded font-medium text-right">Delete</button>
            </form>    
        @endif
        @endauth
    </div>
</div>