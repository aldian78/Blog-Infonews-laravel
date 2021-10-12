<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Blog;

class Tags extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function blogs_tags()
    {
        return $this->belongsToMany(Blog::class);
    }

    // jika route memakai resource dan ingin mencari slug maka pakai ini
    public function getRouteKeyName()
    {
        return 'slug_tags';
    }

    //library sluggable untuk membuat slug otomatis dari judul
    public function sluggable(): array
    {
        return [
            'slug_tags' => [
                'source' => 'nama_tags'
            ]
        ];
    }
}
