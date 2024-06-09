<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\UploadedFiles;

class UploadedFilesController extends Controller
{
    public function index()
    {
        $uploadedFiles = UploadedFiles::all();
        return view("uploaded_files.index", ["uploadedFiles" => $uploadedFiles]);
    }

    public function create(): View
    {
        return view('uploaded_files.create');
    }

    public function store(Request $request)
    {
        $uploadedFiles = new UploadedFiles();
        $uploadedFiles->client_id = $request->client_id;
        $uploadedFiles->filled_form_id = $request->filled_form_id;
        $uploadedFiles->save(); //save
    }
    public function show(string $id): View
    {
        $uploadedFiles = UploadedFiles::findOrFail($id);

        return view('uploaded_files.show', [
            'uploadedFiles' => $uploadedFiles,
        ]);}
    public function edit(string $id): View
    {
        $uploadedFiles = UploadedFiles::findOrFail($id);
        return view('uploaded_files.create', [
            'uploadedFiles' => $uploadedFiles,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $uploadedFile = UploadedFiles::findOrFail($id);

        if (! Gate::allows('alter-uploadedFiles', $uploadedFile)) {
            abort(403);
        }

        $request->validate([
            'client_id' => ['required'],
            'filled_form_id' => ['required'],
        ]);

        $uploadedFile->update([
            'client_id' => $request->client_id,
            'filled_form_id' => $request->filled_form_id,
        ]);

        return redirect(route('uploaded_files.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $uploadedFiles = UploadedFiles::findOrFail($id);
        if (! Gate::allows('alter-form', $uploadedFiles)) {
            abort(403);
        }
        $uploadedFiles->delete();

        return redirect(route('uploaded_files.index', absolute: false))->with('success', 'Uploadedfiles deleted successfully');
    }
}

