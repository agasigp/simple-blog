<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold">My Blog</h1>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6">
        <div class="flex">
            <div class="w-3/4">
                @foreach ($articles as $article)
                <div class="mb-6">
                    <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                    <p class="mt-2">{{ Illuminate\Support\Str::limit($article->content, 50, '...') }}</p>
                    <a href="{{ route('articles.show', [$article->slug]) }}" class="text-blue-500 hover:underline">Read more</a>
                </div>
                @endforeach
                <!-- Add more blog summaries here -->

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $articles->links() }}
                </div>
            </div>

            <aside class="w-1/4 ml-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold">About Me</h2>
                    <p class="mt-2">This is some information about the blog author...</p>
                </div>
            </aside>
        </div>
    </main>

    <footer class="bg-white shadow mt-6">
        <div class="container mx-auto px-4 py-6">
            <p class="text-center">&copy; 2023 My Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>