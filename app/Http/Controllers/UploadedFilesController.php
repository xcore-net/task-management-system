<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Uploadedfiles;

class UploadedfilesController extends Controller
{
    public function index()
    {
        $uploadedfiless = Uploadedfiles::all();
        return view("uploadedfiles.index", ["uploadedfiless" => $uploadedfiless]);
    }

    public function create(): View
    {
        return view('uploadedfiles.create');
    }

    public function store(Request $request)
    {
        $uploadedfiles = new Uploadedfiles();
        $uploadedfiles->client_id = $request->client_id;
        $uploadedfiles->filled_form_id = $request->filled_form_id;
        $uploadedfiles->save(); //save
    }
    public function show(string $id): View
    {
        $uploadedfiles = Uploadedfiles::findOrFail($id);

        return view('$uploadedfiles.show', [
            '$uploadedfiles' => $uploadedfiles,
        ]);}
    public function edit(string $id): View
    {
        $uploadedfiles = uploadedfiles::findOrFail($id);
        return view('uploadedfiles.create', [
            'uploadedfiles' => $uploadedfiles,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $uploadedfiles = Uploadedfiles::findOrFail($id);

        $request->validate([
            'client_id' => ['required'],
            'filled_form_id' => ['required'],
        ]);

        $uploadedfiles->update([
            'client_id' => $request->client_id,
            'filled_form_id' => $request->filled_form_id,
        ]);

        return redirect(route('uploadedfiles.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $uploadedfiles = Uploadedfiles::findOrFail($id);
        $uploadedfiles->delete();

        return redirect(route('uploadedfiles.index', absolute: false))->with('success', 'Uploadedfiles deleted successfully');
    }
}

