<x-layout>
    <x-slot:title>All Posts</x-slot>
<body class="bg-gray-100">
    <div class="flex justify-between items-center my-6">
        <p class="text-gray-600 text-lg">Manage all your posts in one place.</p>
        <x-link-button href="{{ route('posts.create') }}" color="green">
            Create Post
        </x-link-button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white text-sm shadow-md rounded-lg">
            <thead class="bg-gray-200 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Title</th>
                    <th class="px-6 py-3 font-semibold">Posted By</th>
                    <th class="px-6 py-3 font-semibold">Created At</th>
                    <th class="px-6 py-3 font-semibold text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($posts as $post)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-900 font-semibold">{{$post['id']}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post['title']}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post['author']}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post['created_at']}}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <x-link-button href="{{ route('posts.show',$post['id'])}}" color="blue">View</x-link-button>
                        <x-link-button href="{{ route('posts.edit',$post['id'])}}" color="yellow">Edit</x-link-button>
                        <x-link-button href="#" color="red">Delete</x-link-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        <nav class="flex space-x-2">
            <x-link-button href="#">Previous</x-link-button>
            <x-link-button href="#" variant="active">1</x-link-button>
            <x-link-button href="#">2</x-link-button>
            <x-link-button href="#">3</x-link-button>
            <x-link-button href="#">Next</x-link-button>
        </nav>
    </div>
</body>
</x-layout>
