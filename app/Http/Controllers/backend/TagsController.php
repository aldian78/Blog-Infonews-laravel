<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title   = 'Halaman Hastag';
        $hastag  = Tags::latest()->get();
        return view('backend.hastag', compact('title', 'hastag'));
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
            'nama_tags'   => 'required|max:255',
            'slug_tags'   => 'required|unique:tags'
        ]);

        Tags::create($validated);
        return redirect('/hastags')->with('success', 'Hastag berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tags $hastag)
    {
        $rules['nama_tags'] = 'required|max:255';

        if ($request->slug_tags != $hastag->slug_tags) {
            $rules['slug_tags'] = 'required|unique:tags';
        }

        $validated = $request->validate($rules);

        Tags::find($hastag->id)->update($validated);
        return redirect('/hastags')->with('update', 'Hastag berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $hastag)
    {
        Tags::destroy($hastag->id);
        return redirect('/hastags')->with('delete', 'Hastag berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Tags::class, 'slug_tags', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
