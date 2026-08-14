<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'category', 'cover_image', 'is_published'];

    protected $casts = ['is_published' => 'boolean'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }

    public function getCoverImageUrlAttribute(): string
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        $first = $this->images()->first();
        return $first ? asset('storage/' . $first->image) : asset('images/placeholder-gallery.jpg');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($album) {
            if (empty($album->slug)) {
                $album->slug = Str::slug($album->title);
            }
        });
    }
}
