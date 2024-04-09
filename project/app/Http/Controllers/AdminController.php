<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function allContacts() {
        $contact = new Contact();
        return view('admin.index', ['data' => $contact->orderBy('created_at', 'desc')->take(5)->get()]);
    }
    public function oneContact($id) {
        $contact = new Contact();
        return view('admin.one', ['data' => $contact->find($id)]);
    }
    public function editContact($id) {
        $contact = new Contact();
        return view('admin.edit', ['data' => $contact->find($id)]);
    }
    public function editContactSubmit($id, AdminRequest $req) {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('admin-one', $id)->with('success','Сообщение было обновлено');
        
    }
    
    public function deleteContact($id) {
        Contact::find($id)->delete();
        return redirect()->route('admin-all')->with('success', 'Сообщение было удалено');
    }
}