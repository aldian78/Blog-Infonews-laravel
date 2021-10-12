<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\Categori;
use App\Models\Tags;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title"     => "Home",
            "blog"      => Blog::latest()->filter(request(['categori']))->paginate(6)->withQueryString(),
            "categori"  => Categori::all(),
            "tags"      => Tags::all()
        ]);
    }
}
