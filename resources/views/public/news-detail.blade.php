@extends('layouts.public')

@section('title', $article->title)
@section('meta_description', $article->excerpt ?? Str::limit(strip_tags($article->content), 160))

@section('content')

<article>
    {{-- Hero Image --}}
    <div class="relative bg-gray-900 h-72 md:h-96 overflow-hidden">
        <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}"
             class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 flex items-end">
            <div class="max-w-4xl mx-auto px-4 pb-10 w-full">
                @if($article->category)
                    <span class="bg-flame-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $article->category->name }}</span>
                @endif
                <h1 class="text-3xl md:text-4xl font-black text-white mt-3 leading-tight">{{ $article->title }}</h1>
                <p class="text-gray-300 text-sm mt-2">
                    @if($article->author) By {{ $article->author->name }} · @endif
                    {{ $article->published_at?->format('d F Y') }}
                </p>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {!! $article->content !!}
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100">
                <a href="{{ route('news.index') }}" class="btn-outline">← Back to News</a>
            </div>
        </div>
    </div>
</article>

{{-- Related Articles --}}
@if($related->count())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="card group block">
                <div class="overflow-hidden">
                    <img src="{{ $item->featured_image_url }}" alt="{{ $item->title }}"
                         class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 group-hover:text-flame-600 transition-colors">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-400 mt-2">{{ $item->published_at?->format('d M Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@php use Illuminate\Support\Str; @endphp
