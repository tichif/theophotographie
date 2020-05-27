<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getContact()
    {
        $page_name = "Contactez nous";
        return view('front.pages.contact', compact('page_name'));
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|min:5|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ], [
            'firstname.required' => 'Tu dois mettre ton prénom.',
            'lastname.required' => 'Tu dois mettre ton nom.',
            'email.required' => 'Tu dois mettre ton email.',
            'subject.required' => 'Tu dois mettre le but de ton message.',
            'message.required' => 'Tu dois mettre le message',
            'firstname.min' => 'Ton prénom est incorrect, vérifie pour voir.',
            'lastname.min' => 'Ton nom est incorrect, vérifie pour voir.',
            'email.min' => 'Ton email est incorrect, vérifie pour voir.',
            'subject.min' => 'Le sujet doit avoir au moins 5 caractères.',
            'message.min' => 'Seulement ça, tu ne veux rien me dire de plus ?',
        ]);

        $data = [
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to('test@tichif.com')->send(new ContactMail($data));
        return back()->with('toast_success', 'Votre message a été envoyé.Merci de de nous avoir contacté.😀😀');
    }
}
