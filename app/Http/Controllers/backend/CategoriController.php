<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Halaman Categories';
        $categori = Categori::latest()->get();

        return view('backend.categories', compact('title', 'categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:categoris',
        ]);

        Categori::create($validated);
        return redirect('/category')->with('success', 'Categori berhasil ditambah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categori $category)
    {
        $rules['nama'] = 'required|max:255';

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categoris';
        }
        $validated = $request->validate($rules);

        Categori::find($category->id)->update($validated);
        return redirect('/category')->with('update', 'Categori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categori $category)
    {
        $posts = Blog::where('categori_id', $category->id)->get();
        foreach ($posts as $post) {
            // delete gambar
            if (!empty($post->image)) {
                Storage::delete($post->image);
            }
        }

        Categori::find($category->id)->delete();
        return redirect('/category')->with('delete', 'Categori berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categori::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
