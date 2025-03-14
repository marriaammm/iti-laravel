<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your App</title>
    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}"></div>
</body>
</html>