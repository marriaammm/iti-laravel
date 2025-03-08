<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'ITI Blog' }}</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold mb-6 text-gray-900">
            ITI Blog - 
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">
                All Posts
            </a>
        </h2>

        {{ $slot }}
    </div>
</body>
</html>