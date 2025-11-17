<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'event_type' => 'nullable|string|max:255',
            'guests' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'observations' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_type' => $request->event_type,
            'guests' => $request->guests,
            'city' => $request->city,
            'date' => $request->date,
            'observations' => $request->observations,
            'type' => 'contact',
        ]);

        // TODO: Implementar envio de email
        
        return redirect()->route('contact.index')->with('success', 'Recebemos sua mensagem! Em breve entraremos em contato.');
    }

    public function budget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'event_type' => 'nullable|string|max:255',
            'guests' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'observations' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_type' => $request->event_type,
            'guests' => $request->guests,
            'location' => $request->location,
            'date' => $request->date,
            'observations' => $request->observations,
            'type' => 'budget',
        ]);

        // TODO: Implementar envio de email
        
        return redirect()->route('contact.index')->with('success', 'Recebemos sua solicitação de orçamento! Em breve entraremos em contato.');
    }
}

