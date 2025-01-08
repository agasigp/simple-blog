<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="articleForm" class="space-y-4" method="POST"
                        action="{{ $action === 'create' ? route('articles.store') : route('articles.update', $article->id) }}">
                        @csrf
                        @if ($action === 'edit')
                            @method('PUT')
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1" for="title">Judul
                                Artikel</label>
                            <input type="text" id="title"
                                class="input input-bordered w-full @error('title') textarea-error @enderror""
                                name="title" value="{{ old('title', $article->title) }}"
                                placeholder="Masukkan judul artikel" />
                            @error('title')
                                <p id="contentError" class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1" for="content">Isi
                                Artikel</label>
                            <textarea id="content" class="textarea textarea-bordered w-full @error('content') textarea-error @enderror"
                                placeholder="Masukkan isi artikel" rows="4" name="content">{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <p id="contentError" class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1" for="status">Status
                                Artikel</label>
                            <select id="status" class="select select-bordered w-full" name="is_published">
                                <option value="0" {{ $article->is_published ? '' : 'selected' }}>Draft</option>
                                <option value="1" {{ $article->is_published ? 'selected' : '' }}>Terbit</option>
                            </select>
                            @error('is_published')
                                <p id="contentError" class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Simpan Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
