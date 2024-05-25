<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;




class ClientController extends Controller
{
    public function index(): View
    {
        $clients = clients::all();
        return view('clients.index', ['clients' => $clients]);
    }



    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:clients,email', // Unique email validation
            'phone' => 'required|string|min:10|max:10', // Adjust phone number validation as needed
        ]);

        $client = clients::create($request->all());

        return redirect()->route('clients_view')->with('success', 'Client created successfully!');

    }



}
