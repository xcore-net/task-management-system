<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        return view('client.index', ['clients' => $clients]);
    }

    public function create(): View
    {
        return view('client.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],

        ]);

        clients::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
        ]);

        return redirect(route('client.index', absolute: false));
    }

    public function show(string $id): View
    {
        $client = clients::findOrFail($id);

        if (!$client) {
            // Handle client not found
        }

        return view('client.show', [
            'client' => $client,
        ]);
    }

    public function edit(string $id): View
    {
        $client = clients::findOrFail($id);
        return view('client.create', [
            'client' => $client,
        ]);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $client = clients::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone
        ]);

        return redirect(route('client.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $client = clients::findOrFail($id);
        $client->delete();

        return redirect(route('client.index', absolute: false))->with('success', 'Client deleted successfully');
    }




}
