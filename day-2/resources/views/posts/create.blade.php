<x-layout>
    <x-slot:title>Create Post</x-slot>

    <form action="{{route('posts.store')}}" method="POST">
        @csrf

        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" required
                class="w-full p-2 border border-gray-300 rounded-lg mt-1">
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" rows="4" required
                class="w-full p-2 border border-gray-300 rounded-lg mt-1"></textarea>
        </div>

        <!-- Post Creator Dropdown -->
        <div class="mb-6">
            <label for="creator" class="block text-gray-700 font-medium">Post Creator</label>
            <select name="creator" id="creator" 
                class="w-full p-2 border border-gray-300 rounded-lg mt-1">
                @foreach ( $users as $user )
                <option value="{{ $user->id }}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-button type="submit" class="w-full">
                Create
            </x-button>
        </div>
    </form>
</x-layout>