<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\DocumentType;
use App\Models\Form;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::all();
        return view("documentType.index", ["documentTypes" => $documentTypes]);
    }

    public function create(): View
    {
        $forms = Form::all();
        return view('documentType.create', ['forms' => $forms]);
    }

    public function store(Request $request): RedirectResponse
    {
        $documentType = new DocumentType();
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'form_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'last_updated_by' => ['required','string'],
        ]);

        $documentType::create([
            'name' => $request->name,
            'form_id' => $request->form_id,
            'user_id' => auth()->user()->id,
            'last_updated_by'=>auth()->user()->name
        ]);
        return redirect(route('documentType.index', absolute: false));
    }

    public function show(string $id): View
    {
        $documentType = DocumentType::findOrFail($id);

        return view('documentType.show', [
            'documentType' => $documentType,
        ]);
    }

    public function edit(string $id): View
    {
        $documentType = DocumentType::findOrFail($id);
        $forms = Form::all();
        return view('documentType.create', [
            'documentType' => $documentType,'forms' => $forms
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $documentType = DocumentType::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'form_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'last_updated_by' => ['required','string'],
        ]);

        $documentType->update([
            'name' => $request->name,
            'form_id' => $request->form_id,
            'user_id' => auth()->user()->id,
            'last_updated_by'=>auth()->user()->name
        ]);

        return redirect(route('documentType.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();

        return redirect(route('documentType.index', absolute: false))->with('success', 'Document Type deleted successfully');
    }
}
