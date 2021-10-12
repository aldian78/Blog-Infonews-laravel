<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Blog;

class Categori extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    // jika route memakai resource dan ingin mencari slug maka pakai ini
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //library sluggable untuk membuat slug otomatis dari judul
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
