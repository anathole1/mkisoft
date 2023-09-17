<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class ContactController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'names' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'subject' => 'required',
            'message' => 'required'
        ]);
      Contact::create([
            'name' => $request->names,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);


        Mail::to('anathole.niyongana@cboingenzi.org')->send(new ContactMail($request));


        Toast::title('Your message sent successful, we will get back to you')->autoDismiss(5);

        return redirect()->back();
    }

    public function create(){
        return view('frontend.contactus');
    }

    public function index(){
        $contacts = QueryBuilder::for(Contact::class)
        ->defaultSort('name')
        ->allowedSorts(['name','subject','email'])
        ->allowedFilters(['name','subject','email','id'])
        ->paginate(5)
        ->withQueryString();
       
        return view('contacts.index', [
            'contacts' => SpladeTable::for($contacts)
            ->defaultSort('name')
            ->column('name', sortable:true, searchable:true)
            ->column('email', sortable:true, searchable:true)
            ->column('subject', sortable:true, searchable:true)
            ->column('message')
            ->column('action')

        ]);
    }

    public function destroy(Contact $contact){
        $contact->delete();
        Toast::title('Email Deleted Successful!')->warning() ->autoDismiss(5);
        return redirect()->back();
    }
}
