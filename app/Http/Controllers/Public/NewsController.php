<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $articles = NewsArticle::where('is_published', true)
            ->with('category', 'author')
            ->orderByDesc('published_at')
            ->paginate(9);

        $categories = NewsCategory::withCount(['articles' => fn ($q) => $q->where('is_published', true)])->get();

        return view('public.news', compact('articles', 'categories'));
    }

    public function show(string $slug)
    {
        $article = NewsArticle::where('slug', $slug)
            ->where('is_published', true)
            ->with('category', 'author')
            ->firstOrFail();

        $related = NewsArticle::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where('news_category_id', $article->news_category_id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('public.news-detail', compact('article', 'related'));
    }
}
