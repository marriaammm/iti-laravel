<x-layout>
    <x-slot:title>Edit Post</x-slot>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" 
                class="w-full p-2 border rounded-lg mt-1 @error('title') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                value="{{ old('title', $post->title) }}">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full p-2 border rounded-lg mt-1 @error('description') border-red-500 bg-red-50 @else border-gray-300 @enderror">{{ old('description', $post->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Post Creator Dropdown -->
        <div class="mb-6">
            <label for="creator" class="block text-gray-700 font-medium">Post Creator</label>
            <select name="creator" id="creator"
                class="w-full p-2 border rounded-lg mt-1 @error('creator') border-red-500 bg-red-50 @else border-gray-300 @enderror">
                <option value="">Select a Creator</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('creator', $post->creator) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('creator')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                Update
            </x-button>
        </div>
    </form>
</x-layout>
