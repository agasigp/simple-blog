<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class ArticleListController extends Controller
{
    public function __invoke()
    {
        $articles = Article::query()
            ->where('is_published', true)
            ->when(request('search'), function (Builder $query) {
                $query->where(function (Builder $query) {
                    $query->where('title', 'like', '%' . request('search') . '%')
                        ->orWhere('content', 'like', '%' . request('search') . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('articles.list', [
            'articles' => $articles,
        ]);
    }
}
