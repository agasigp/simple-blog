<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Title</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold">My Blog</h1>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6">
        <article class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
            <p class="mt-4">{{ $article->content }}</p>
            <!-- Add more content here -->
        </article>
        <a href="{{ route('articles.list') }}" class="btn btn-primary mt-3">Kembali</a>
    </main>

    <footer class="bg-white shadow mt-6">
        <div class="container mx-auto px-4 py-6">
            <p class="text-center">&copy; 2023 My Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>