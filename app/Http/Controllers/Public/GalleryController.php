<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::where('is_published', true)
            ->withCount('images')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('public.gallery', compact('albums'));
    }

    public function show(string $slug)
    {
        $album = GalleryAlbum::where('slug', $slug)
            ->where('is_published', true)
            ->with('images')
            ->firstOrFail();

        return view('public.gallery-album', compact('album'));
    }
}
