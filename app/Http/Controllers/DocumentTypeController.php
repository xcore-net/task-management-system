<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\DocumentType;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::all();
        return view("documentType.index", ["documentTypes" => $documentTypes]);
    }

    public function create(): View
    {
        return view('documentType.create');
    }

    public function store(Request $request)
    {
        $documentType = new DocumentType();
        $documentType->name = $request->name;
        $documentType->save();
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
        return view('documentType.create', [
            'documentType' => $documentType,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $documentType = DocumentType::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $documentType->update([
            'name' => $request->name,
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
