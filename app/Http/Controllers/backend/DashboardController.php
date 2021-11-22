<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\Tags;
use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $totalBlog = Blog::all()->count();
        $totalTags = Tags::all()->count();
        $totalSubs = Subscribers::all()->count();
        $totalMsg = Contact::all()->count();

        //Get ip address
        $ipAdress = request()->ip();
        $dateTime = date("Y-m-d");

        $check = Visitor::where('visitor', $ipAdress)->whereDate('created_at', $dateTime);
        $count = $check->count();

        if ($count == 0) {
            $insert = [
                'visitor' => $ipAdress,
                'hits'    => 1
            ];

            Visitor::create($insert);
        } else {
            Visitor::where('visitor', $ipAdress)
                ->whereDate('created_at', $dateTime)
                ->update(['hits' => DB::raw('hits + 1')]);
        }

        $grafik = Visitor::select(DB::raw("month(created_at) bulan, $dateTime"))->groupBy('bulan')->get();
        foreach ($grafik as $key => $dataGrafik) {
            $bulan[] = bulan($dataGrafik->bulan);
            $totalCount[] = (int)$dataGrafik->count();
        }

        return view('backend.dashboard', compact('title', 'totalBlog', 'totalTags', 'totalSubs', 'totalMsg', 'bulan', 'totalCount'));
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
