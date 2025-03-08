<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>All Posts</title>
</head>
<body>
    
<div class="overflow-x-auto p-6">
    <h2 class="text-2xl font-bold">ITI Blog - All Posts</h2>
    
    <div class="flex justify-end my-4">
        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Create Post</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200 bg-white text-sm">
        <thead class="text-left bg-gray-100">
            <tr>
                <th class="px-4 py-2 font-medium text-gray-900">#</th>
                <th class="px-4 py-2 font-medium text-gray-900">Title</th>
                <th class="px-4 py-2 font-medium text-gray-900">Posted By</th>
                <th class="px-4 py-2 font-medium text-gray-900">Created At</th>
                <th class="px-4 py-2 font-medium text-gray-900">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @foreach ($posts as $post)
            <tr>
                <td class="px-4 py-2 text-gray-900 font-semibold">{{$post['id']}}</td>
                <td class="px-4 py-2 text-gray-700">{{$post['title']}}</td>
                <td class="px-4 py-2 text-gray-700">{{$post['author']}}</td>
                <td class="px-4 py-2 text-gray-700">{{$post['created_at']}}</td>
                <td class="px-4 py-2">
                    <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View</a>
                    <a href="#" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <a href="#" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        <nav class="flex justify-center">
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="#" class="px-3 py-1 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-900">1</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                </li>
            </ul>
        </nav>
    </div>

</div>

</body>
</html>
