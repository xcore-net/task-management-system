<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\DocumentType;
use App\Models\Form;


class ClientController extends Controller
{

    public function index(): View
    {
        $clients = Client::with('documentTypes')->get();

        return view('Client.index', compact('clients'));
    }
    /**
     * Display the create client view.
     */
    public function create(): View
    {
        $documentTypes = DocumentType::all();
        $forms= Form::all();
        return view('Client.create', ['documentTypes'=>$documentTypes,"forms"=>$forms]);
    }
    /**
     * Handle an incoming client request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'documentTypes' => ['required', 'array']
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        $client->documentTypes()->sync($request->documentTypes);
        $client->forms()->sync($request->forms);
        return redirect(route('client.index', absolute: false));
    }

    public function show(string $id): View
    {
        $client = Client::findOrFail($id);

        return view('client.show', [
            'client' => $client,
        ]);
    }

    public function edit(string $id): View
    {
        $documentTypes = DocumentType::all();
        $forms= Form::all();
        return view('client.create', [
            'documentTypes' => $documentTypes,'forms'=>$forms
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $client = Client::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'documentTypes' => ['required', 'array']
        ]);
        $client->forms()->sync($request->forms);
        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $client->documentTypes()->sync($request->documentTypes);
        $client->forms()->sync($request->forms);

        return redirect(route('client.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $client = Client::findOrFail($id);
        $client->documentTypes()->detach();
        $client->forms()->detach();
        $client->delete();

        return redirect(route('client.index', absolute: false))->with('success', 'Client deleted successfully');
    }
}
