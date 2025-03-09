<x-layout>
    <x-slot:title>Post Details</x-slot>
    <!-- Post Info -->
    <div class="border border-gray-300 rounded-lg p-6 mb-4">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Info</h3>
        <p class="text-gray-700"><strong>Title :-</strong> {{$post->title}}</p>
        <p class="text-gray-700"><strong>Description :-</strong> {{$post->description}}</p>
    </div>

    <!-- Post Creator Info -->
    <div class="border border-gray-300 rounded-lg p-6 ">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Creator Info</h3>
        <p class="text-gray-700"><strong>Name :-</strong> {{$post->user->name}}</p>
        <p class="text-gray-700"><strong>Email :-</strong> {{$post->user->email}}</p>
        <p class="text-gray-700">
            <strong>Created At :-</strong> 
            {{$post->user->created_at->format('F j, Y')}}
        </p>
    </div>
    
    {{-- comment section --}}
    {{-- @dd($post->comments) --}}
    <div class="border border-gray-300 rounded-lg p-6 mt-4">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>
        @foreach ($post->comments as $comment)
            <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500">By:
                    {{ $comment->user->name ?? $post->user->name }} 
                    |{{ $comment->created_at->diffForHumans() }}
                </p>
                <!-- Delete Comment -->
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button color="red">Delete</x-button>
                </form>
            </div>
        @endforeach
    </div>

    <!-- Add Comment Form -->
    <div class="border border-gray-300 rounded-lg p-6 mt-4">
        <h3 class="text-lg font-semibold mb-4">Add a Comment</h3>
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <textarea name="body" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Post Comment</button>
        </form>
    </div>
</x-layout>
