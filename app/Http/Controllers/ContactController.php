<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function adminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function addContact()
    {
        return view('admin.contact.create');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:contacts|max:255',
            'phone' => 'required|unique:contacts|min:11',
            'address' => 'required|unique:contacts|min:5',
        ],
            [
                'email.required' =>  'Please enter contact email',
                'phone.min' =>  'Phone less than 11 numbers',
                'address.min' =>  'Address less than 5 chars',
            ]
        );
        Contact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Contact inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.contact')->with($notification);
    }

    public function editContact($id)
    {
        $contact = Contact::findOrfail($id);
        return view('admin.contact.edit', compact('contact'));
    }
    // Update Brand
    public function updateContact(Request $request, $id)
    {
        Contact::findOrfail($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Contact updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.contact')->with($notification);
    }

    // Delete Contact
    public function deleteContact($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Contact deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


//    Home Contact page
    public function contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

//    Store Contact Message
    public function contactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:contact_forms|max:255',
            'email' => 'required|unique:contact_forms|max:255',
            'subject' => 'required|unique:contact_forms|min:5',
            'message' => 'required|unique:contact_forms|min:5',
        ],
            [
                'name.required' =>  'Please enter contact name',
                'email.required' =>  'Please enter contact email',
                'subject.min' =>  'Phone less than 5 chars',
                'message.min' =>  'Address less than 5 chars',
            ]
        );
        ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => 'Your message send successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('contact')->with($notification);
    }

    //  Contact Message page
    public function adminMessage()
    {
        $messages = DB::table('contact_forms')->get();
        return view('admin.contact.message', compact('messages'));
    }
    // Delete Message
    public function deleteMessage($id)
    {
        ContactForm::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
