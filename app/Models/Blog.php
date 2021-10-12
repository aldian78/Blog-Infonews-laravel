<?php

namespace App\Models;

use App\Models\Tags;
use App\Models\User;
use App\Models\Likes;
use App\Models\Categori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    // eager loading
    protected $with = ['user', 'categori', 'tags', 'like'];

    public function categori()
    {
        return $this->belongsTo(Categori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function like()
    {
        return $this->hasMany(Likes::class);
    }

    public function scopeFilter($query, array $filters)
    {
        // when fungsi laravel, cek search fungsi null coalescing operator php
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        });

        $query->when($filters['categori'] ?? false, function ($query, $categori) {
            // whereHas > query yang punya relationship apa? karna kita manggil kategori
            // keyword use > untuk deklarasikan variabel
            return $query->whereHas('categori', function ($query) use ($categori) {
                $query->where('slug', $categori);
            });
        });

        $query->when($filters['month'] ?? false, function ($query, $month) {
            // $bulan = Carbon::createFromDate($month);
            return $query->whereMonth('created_at', $month);
        });

        $query->when($filters['year'] ?? false, function ($query, $year) {
            return $query->whereYear('created_at', $year);
        });

        $query->when($filters['tags'] ?? false, function ($query, $tags) {
            return $query->whereHas('tags', function ($query) use ($tags) {
                $query->where('slug_tags', $tags);
            });
        });
    }

    public function scopeArchives($query)
    {
        return $query->selectRaw('year(created_at) year, month(created_at) month, count(*) total')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
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
                'source' => 'judul'
            ]
        ];
    }
}
