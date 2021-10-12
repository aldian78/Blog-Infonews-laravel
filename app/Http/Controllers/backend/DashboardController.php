<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('backend.dashboard',  compact('title'));
    }

    public function indexSubscribe()
    {
        $title      = 'Subscriber';
        $subscriber = Subscribers::latest()->get();
        return view('backend.subscribe',  compact('title', 'subscriber'));
    }

    public function storeSubscribe(Request $request)
    {
        //untuk mengubah alias nama saat input dan buat array baru sesuai nama pada field database 
        $validated = $request->validate([
            'emailSubscribe' => 'required|email|unique:subscribers,email',
        ]);

        $array = [
            'email' => $validated['emailSubscribe'],
        ];

        Subscribers::create($array);
        return back()->with('success', 'Terima kasih atas supportnya');
    }

    public function destroySubscribe($id)
    {
        Subscribers::destroy($id);
        return redirect('/subscribe')->with('delete', 'Subscribers berhasil dihapus');
    }
}
