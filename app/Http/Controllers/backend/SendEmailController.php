<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Models\Contact;
use App\Mail\SendEmail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendContact($id)
    {
        $contacts = Contact::find($id);

        $details = [
            'title'       => 'InfoNews',
            'body'        => 'Hallo ' . $contacts->nama,
            'description' => 'Terima kasih telah menghubungi kami secepatnya segera kita proses',
            'image'       => public_path() . '/img/thankyou.jpg'
        ];

        Mail::to($contacts->email)->send(new ContactEmail($details));
        return redirect('/contacts')->with('success', 'Pesan Email berhasil dikirim');
    }
}
