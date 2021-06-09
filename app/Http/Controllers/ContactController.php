<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Email;
use App\Models\MobileNumber;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated([
            ''
        ]);

        try {
            $contact = Contact::create([
                'name' => $data['name']
            ]);
            $email = Email::create([
                'email' => $data['email']
            ]);
            $mobile = MobileNumber::create([
                'number' => $data['number']
            ]);

            $contact->emails()->sync($email->id);
            $contact->mobile_numbers()->sync($mobile->id);
        } catch (Exception $exception) {
            info($exception->getMessage());
            return back()->with('error', 'Error occurred check log file!!!');
        }
        return back()->with('success', 'Successfully added!!!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        $contact = Contact::findOrFail($id);

        $contact->name = $request->input('name');
        $contact->save();

        return redirect(route('contact.index'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return back();
    }

    public function emails($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        return view('contact.emails', compact('contact'));
    }

    public function numbers($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        return view('contact.numbers', compact('contact'));
    }
}
