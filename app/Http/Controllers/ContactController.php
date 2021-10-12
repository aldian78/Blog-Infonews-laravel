<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Categori;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'title' => 'Contact',
            'categori' => Categori::all(),
            'tags'  => Tags::all()
        ]);
    }
}
