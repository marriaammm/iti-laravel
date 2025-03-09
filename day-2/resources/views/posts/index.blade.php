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
                    <th class="px-6 py-3 font-semibold">Deleted At</th>
                    <th class="px-6 py-3 font-semibold text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($posts as $post)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-900 font-semibold">{{$post->id}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post->title}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post->user->name}}</td>
                    <td class="px-6 py-4 text-gray-700">{{$post->created_at->format('Y-m-d')}}</td>
                    <td>{{ $post->deleted_at ? 'Deleted' : 'Active' }}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <x-link-button href="{{ route('posts.show',$post->id)}}" color="blue">View</x-link-button>
                        <x-link-button href="{{ route('posts.edit',$post->id)}}" color="yellow">Edit</x-link-button>
                        @if($post->deleted_at)
                <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                </form>
            @else
                    <x-button data-bs-toggle="modal" data-bs-target="#deleteModal" data-post-id="{{ $post->id }}"  color="red" >
                        Delete
                    </x-button>
            @endif
                            
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- modla for confirming the delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    
                    <!-- Form for deleting the post -->
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $posts->links() }}
    </div>
</body>
</x-layout>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget;
            let postId = button.getAttribute('data-post-id');
            let deleteForm = document.getElementById('deleteForm');
            deleteForm.action = "/posts/" + postId;
        });
    });
</script>

