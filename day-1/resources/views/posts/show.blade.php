<x-layout>
    <x-slot:title>Post Details</x-slot>
    <!-- Post Info -->
    <div class="border border-gray-300 rounded-lg p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Info</h3>
        <p class="text-gray-700"><strong>Title :-</strong> {{$post['title']}}</p>
        <p class="text-gray-700"><strong>Description :-</strong> {{$post['description']}}</p>
    </div>

    <!-- Post Creator Info -->
    <div class="border border-gray-300 rounded-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Creator Info</h3>
        <p class="text-gray-700"><strong>Name :-</strong> {{$post['posted_by']['name']}}</p>
        <p class="text-gray-700"><strong>Email :-</strong> {{$post['posted_by']['email']}}</p>
        <p class="text-gray-700">
            <strong>Created At :-</strong> 
            {{$post['posted_by']['created_at']}}
        </p>
    </div>
</x-layout>
