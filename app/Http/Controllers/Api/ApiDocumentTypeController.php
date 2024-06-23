<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\DocumentType;

class ApiDocumentTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $documentTypes = DocumentType::all();
        return response()->json($documentTypes);
    }

    public function store(Request $request): JsonResponse
    {
        $documentType = new DocumentType();
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'form_id' => ['required', 'integer'],
        ]);

        $documentType::create([
            'name' => $request->name,
            'form_id' => $request->form_id,
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
        ]);
        return response()->json(['message' => 'Document type Created!'])->setStatusCode(201);
    }

    public function show(string $id): JsonResponse
    {
        $documentType = DocumentType::findOrFail($id);

        return response()->json($documentType);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $documentType = DocumentType::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'form_id' => ['required', 'integer'],
        ]);

        $documentType->update([
            'name' => $request->name,
            'form_id' => $request->form_id,
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
        ]);

        return response()->json(['message' => 'Document type Created!'])->setStatusCode(200);
    }

    public function destroy(string $id): JsonResponse
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();

        return response()->json(['message' => 'Document request Deleted!'])->setStatusCode(204);
    }
}
