<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()
            ->where('user_id', auth()->user()->id)
            ->when(request('search'), function(Builder $query) {
                $query->where(function(Builder $query) {
                    $query->where('title', 'like', '%' . request('search') . '%')
                        ->orWhere('content', 'like', '%' . request('search') . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.form', [
            'article' => new Article(),
            'title' => 'Tambah Artikel',
            'action' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->validated());
        $article->slug = Str::slug($request->title);
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect()->route('articles.index')->with('success_message', 'Artikel berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.form', [
            'article' => $article,
            'title' => 'Edit Artikel',
            'action' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->fill($request->validated());
        $article->slug = Str::slug($request->title);
        $article->save();

        return redirect()->route('articles.index')->with('success_message', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
