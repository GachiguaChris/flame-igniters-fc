@extends('layouts.public')

@section('title', $album->title . ' — Gallery')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">{{ $album->category }}</p>
        <h1 class="text-4xl md:text-5xl font-black">{{ $album->title }}</h1>
        @if($album->description)
            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">{{ $album->description }}</p>
        @endif
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3" x-data="{ lightbox: null }">
            @foreach($album->images as $image)
            <div class="overflow-hidden rounded-lg cursor-pointer group" @click="lightbox = '{{ $image->image_url }}'">
                <img src="{{ $image->image_url }}" alt="{{ $image->caption ?? $album->title }}"
                     class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
            </div>
            @endforeach

            {{-- Lightbox --}}
            <div x-show="lightbox" x-cloak
                 class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4"
                 @click.self="lightbox = null" @keydown.escape.window="lightbox = null">
                <button @click="lightbox = null" class="absolute top-4 right-4 text-white text-3xl font-bold">&times;</button>
                <img :src="lightbox" class="max-w-full max-h-full rounded-lg shadow-2xl">
            </div>
        </div>

        @if($album->images->isEmpty())
        <div class="text-center py-20">
            <p class="text-5xl mb-4">📷</p>
            <p class="text-gray-500">No photos in this album yet.</p>
        </div>
        @endif

        <div class="mt-10">
            <a href="{{ route('gallery.index') }}" class="btn-outline">← Back to Gallery</a>
        </div>
    </div>
</section>

@endsection
