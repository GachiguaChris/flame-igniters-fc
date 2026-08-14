@extends('layouts.public')

@section('title', 'News')
@section('meta_description', 'Latest news, match reports, and announcements from Flame Igniters FC.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Latest Updates</p>
        <h1 class="text-4xl md:text-5xl font-black">News & Announcements</h1>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 flex flex-col lg:flex-row gap-10">

        {{-- Articles --}}
        <div class="flex-1">
            @forelse($articles as $article)
            <a href="{{ route('news.show', $article->slug) }}" class="card flex flex-col sm:flex-row mb-6 group">
                <div class="sm:w-56 flex-shrink-0 overflow-hidden">
                    <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}"
                         class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        @if($article->category)
                            <span class="text-xs font-bold text-flame-600 uppercase tracking-wider">{{ $article->category->name }}</span>
                        @endif
                        <h2 class="font-bold text-xl text-gray-900 mt-2 mb-2 group-hover:text-flame-600 transition-colors">{{ $article->title }}</h2>
                        <p class="text-gray-500 text-sm line-clamp-3">{{ $article->excerpt }}</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 text-xs text-gray-400">
                        @if($article->author)
                            <span>By {{ $article->author->name }}</span>
                            <span>·</span>
                        @endif
                        <span>{{ $article->published_at?->format('d M Y') }}</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="text-center py-20">
                <p class="text-5xl mb-4">📰</p>
                <p class="text-gray-500">No articles published yet.</p>
            </div>
            @endforelse
            <div class="mt-6">{{ $articles->links() }}</div>
        </div>

        {{-- Sidebar --}}
        <aside class="lg:w-64 flex-shrink-0">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-4">Categories</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('news.index') }}" class="flex justify-between items-center text-gray-600 hover:text-flame-600 transition-colors py-1">
                            <span>All News</span>
                            <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">{{ $articles->total() }}</span>
                        </a>
                    </li>
                    @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('news.index') }}?category={{ $cat->slug }}" class="flex justify-between items-center text-gray-600 hover:text-flame-600 transition-colors py-1">
                            <span>{{ $cat->name }}</span>
                            <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">{{ $cat->articles_count }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>

    </div>
</section>

@endsection
