<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Categori;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'About',
            'categori' => Categori::all(),
            'tags'  => Tags::all()
        ]);
    }
}
