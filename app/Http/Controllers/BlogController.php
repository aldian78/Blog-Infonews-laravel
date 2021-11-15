<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tags;
use App\Models\Categori;
use App\Models\Likes;

class BlogController extends Controller
{
    public function index()
    {
        $title = '';

        // categori
        if (request('categori')) {
            $categori = Categori::firstWhere('slug', request('categori'));
            $title = ' in ' . $categori->nama;
        }

        //archives
        if (request('month') && request('year')) {
            $title = ' on ' . bulan(request('month')) . ' ' . request('year');
        }

        // tags
        if (request('tags')) {
            $tags  = Tags::firstWhere('slug_tags', request('tags'));
            $title = ' in ' . $tags->nama_tags;
        }

        return view('blog', [
            'title'     => 'All Blog' . $title,
            'post'      => Blog::latest()->filter(request(['search', 'categori', 'month', 'year', 'tags']))->paginate(8),
            'categori'  => Categori::all(),
            'tags'      => Tags::all(),
            'blogLimit' => Blog::limit(6)->get(),
            'groupDate' => Blog::archives(),
        ]);
    }

    public function detail(Blog $blog)
    {
        $title      = 'Halaman Detail';
        $categori   = Categori::all();
        $tags       = Tags::all();
        $blogLimit  = Blog::limit(6)->get();
        $groupDate  = Blog::archives();
        $count      = Likes::where('blog_id', $blog->id)->get();
        $countLike  = $count->count();

        return view('detail_blog', compact('blog', 'title', 'categori', 'blogLimit', 'groupDate', 'tags', 'countLike'));
    }

    public function likeBlog(Request $request)
    {
        $ip_address = $request->ip();

        $member = Likes::where('ip_address', $ip_address)->where('blog_id', $request->blog_id)->first();

        if ($member) {
            Likes::where('ip_address', $ip_address)->where('blog_id', $request->blog_id)->delete();
            return back()->with('unlike', 'blog ini berhasil di unlike');
        } else {
            Likes::create([
                'ip_address' => $request->ip(),
                'blog_id'   => $request->blog_id,
                'like'      => 1
            ]);
            return back()->with('like', 'terima kasih sudah menyukai blog ini');
        }
    }
}
