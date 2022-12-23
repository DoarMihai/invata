<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request)
    {
        //send the email

        $contactMail = new ContactMail();

        //return with success
    }
}
