<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        
        $contact = new Contact();
        $contact->id_user =Auth::user()->id;
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было добавлено');
    }
    public function allContacts() {
        $contact = new Contact();
        return view('contact.all', ['data' => $contact->orderBy('created_at', 'desc')->take(5)->get()]);
    }
    public function oneContact($id) {
        $contact = new Contact();
        return view('contact.one', ['data' => $contact->find($id)]);
    }

    public function allUserContacts() {
        $contact = new Contact();
        return view('profile.contacts', ['data' => $contact->orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get()]);
    }
    public function oneUserContact($id) {
        $contact = new Contact();
        return view('profile.one', ['data' => $contact->find($id)]);
    }
    public function editUserContact($id) {
        $contact = new Contact();
        return view('profile.update', ['data' => $contact->find($id)]);
    }
    public function editUserContactSubmit($id, ContactRequest $req) {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('profile-contact', $id)->with('success','Сообщение было обновлено');
        
    }
    
    public function deleteUserContact($id) {
        Contact::find($id)->delete();
        return redirect()->route('profile-contacts')->with('success', 'Сообщение было удалено');
    }
}