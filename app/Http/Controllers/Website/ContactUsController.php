<?php

namespace App\Http\Controllers\Website;

use App\Events\ContactFormSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('Website.contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);
        // code to store contact us form data
        $contactForm = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject
        ]);

        $admins = Admin::get(); // Example for admin user
        foreach ($admins as $admin) {
            $admin->notify(new ContactUsNotification($contactForm));
        }
        $var = broadcast(new ContactFormSubmitted($contactForm));
        // dd($var);


        flash()->success('Thank you for contacting us! We will get back to you soon.');
        return back();
    }
}
