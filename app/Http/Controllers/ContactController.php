<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact', [
            'title' => 'Contact Us'
        ]);
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'subject', 'message']);

        Mail::to('nganphan1514@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Bạn đã gửi mail thành công!');
    }
}
