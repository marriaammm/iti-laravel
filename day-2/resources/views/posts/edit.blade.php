<x-layout>
    <x-slot:title>Edit Post</x-slot>
        <!-- Form Container -->
            

            <form action="{{route('posts.update',$post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <!-- Title Input -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{$post->title}}"
                        class="w-full p-2 border border-gray-300 rounded-lg mt-1">
                </div>

                <!-- Description Input -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea name="description" id="description" rows="4" 
                        class="w-full p-2 border border-gray-300 rounded-lg mt-1">{{$post->description}}</textarea>
                </div>

                <!-- Post Creator Dropdown -->
                <div class="mb-4">
                    <label for="creator" class="block text-gray-700 font-medium">Post Creator</label>
                    <select name="creator" id="creator" 
                        class="w-full p-2 border border-gray-300 rounded-lg mt-1">
                        @foreach ( $users as $user )
                        <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <x-button type="submit" class="w-full">
                    Update
                </x-button>
            </form>
</x-layout>
