<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\Tags;
use App\Mail\BlogEmail;
use App\Models\Categori;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use \Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BlogsController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $blog = Blog::where('user_id', auth()->user()->id)->latest()->get();

        return view('backend.blogBackend',  compact('title', 'blog'));
    }

    public function create()
    {
        $title      = 'Create New Blog';
        $categori   = Categori::all();
        $tags       = Tags::all();
        return view('backend.create_blogs', compact('title', 'categori', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'        => 'required|max:255',
            'slug'         => 'required|unique:blogs',
            'categori_id'  => 'required',
            'image'        => 'image|file|max:1024', //lihat rules validasi img didokumentasinya
            'content'      => 'required',
            'tags'         => 'required'
        ]);

        $validated = new Blog(request(['judul', 'slug', 'categori_id', 'content']));

        if ($request->file('image')) {

            //resize image dgn library intervention image
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            // untuk hosting berbayar lebih baik menggunakan simpan gambar difolder storage yg sudah disymlink difolder public
            // $destinationPath =  public_path('storage/blogs-image');

            //untuk hosting gratisan simpan gambar dipublic
            $destinationPath =  public_path('image-blogs');

            $imgFile = Image::make($image->getRealPath());

            //width 750 height 500
            $imgFile->resize(750, 500)->save($destinationPath . '/' . $input['file']);

            $validated->image = 'image-blogs/' . $input['file'];
        }

        $validated->user_id = auth()->user()->id;
        $validated->save();

        //untuk menambah dari table yg berelasi belongsToMany (banyak ke banyak) bisa disebut pivot 
        $validated->tags()->attach($request['tags']);

        // $this->sendEmail($validated);

        // // Blog::create($validated);
        return redirect('blogs')->with('success', 'Blogs berhasil ditambahkan');
    }

    public function sendMailBlog(blog $blog)
    {

        $followers = Subscribers::all();
        if ($followers != null) {
            $details = [
                'title'       => 'InfoNews',
                'body'        => $blog->judul,
                'description' => 'Jika penasaran yuk klik tombol dibawah ini',
                'image'       => URL::to('/') . '/' . $blog->image,
                'slug'        => $blog->slug,
                'url'         => URL::to('/')
            ];

            foreach ($followers as $email) {
                Mail::to($email->email)->send(new BlogEmail($details));
            }

            return redirect('blogs')->with('success', 'Berita baru berhasil dikirim email ke subscribers');
        }
    }

    public function show(Blog $blog)
    {
        $title = 'Detail Blog';
        return view('backend.detail_blogs', [
            'title' => $title,
            'blog' => $blog,
        ]);
    }

    public function edit(Blog $blog)
    {
        if ($blog->user_id !== auth()->user()->id) {
            return view('backend.errors');
        }

        $title    = 'Edit Blog';
        $categori = Categori::all();
        $tagging  = Tags::all();
        return view('backend.update_blogs', compact('title', 'categori', 'blog', 'tagging'));
    }

    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'judul'        => 'required|max:255',
            'categori_id'  => 'required',
            'image'        => 'image|file|max:1024', //lihat rules validasi img didokumentasinya
            'content'      => 'required',
            'tags'         => 'required'
        ];

        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }

        $validated = $request->validate($rules);
        $validated = Blog::find($blog->id);

        //pastikan dibawah validasi
        if ($request->file('image')) {
            //delete gambar lama
            if ($blog->image) {
                Storage::delete($blog->image);
            }

            //resize image dgn library intervention image
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            // untuk hosting berbayar lebih baik menggunakan simpan gambar difolder storage yg sudah disymlink difolder public
            // $destinationPath =  public_path('storage/blogs-image');

            //untuk hosting gratisan simpan gambar dipublic
            $destinationPath =  public_path('image-blogs');

            $imgFile = Image::make($image->getRealPath());

            //width 750 height 500
            $imgFile->resize(750, 500)->save($destinationPath . '/' . $input['file']);
            $validated->image = 'image-blogs/' . $input['file'];
        }

        $validated->user_id = auth()->user()->id;
        $validated->update([
            'judul'        => $request->judul,
            'slug'         => $request->slug,
            'categori_id'  => $request->categori_id,
            'content'      => $request->content
        ]);
        if ($request['tags'] != $blog->slug) {
            //sync metode jika id tidak ada dalam larik maka akan dihapus dari table perantara 
            //dan id yg ada yg akan disimpan
            $validated->tags()->sync($request['tags']);
        }
        return redirect('blogs')->with('update', 'Blogs berhasil diupdate');
    }

    public function destroy(Blog $blog)
    {
        //delete gambar lama && untuk hosting berbayar
        // if ($blog->image) {
        //     Storage::delete($blog->image);
        // }

        //menghapus gambar difolder public untuk hosting gratisan
        if ($blog->image) {
            File::delete($blog->image);
        }

        Blog::destroy($blog->id);
        //untuk menghapus dari table yg beralasi (banyak ke banyak) bisa disebut pivot
        $blog->tags()->detach($blog->tags);
        return redirect('blogs')->with('delete', 'Blogs berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
