<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List Artikel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{ session('success_message') }}
                            </div>
                        @endif
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="articleList">
                                @if ($articles->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-gray-500">Belum ada artikel.</td>
                                    </tr>
                                @else
                                    @php
                                        $no =
                                            $articles->currentPage() == 1
                                                ? 1
                                                : $articles->perPage() * ($articles->currentPage() - 1) + 1;
                                    @endphp
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->slug }}</td>
                                            <td>
                                                <span class="badge badge-{{ $article->is_published ? 'success' : 'warning' }}">{{ $article->is_published ? 'Published' : 'Draft' }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('articles.edit', [$article->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="#" class="btn btn-sm btn-error">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
