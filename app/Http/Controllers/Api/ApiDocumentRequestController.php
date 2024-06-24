<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Document_request;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiDocumentRequestController extends Controller
{
    public function index(): JsonResponse
    {
        $document_requests = Document_request::all();

        return response()->json($document_requests);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'client_id' => ['required', 'integer',],
            'document_type_id' => ['required', 'integer'],
        ]);

        $doc = Document_request::create([
            'client_id' => $request->client_id,
            'document_type_id' => $request->document_type_id,
        ]);

        return response()->json(['message' => 'Document request Created!'])->setStatusCode(201);
    }
    public function show($docReqId): JsonResponse
    {
        $docReq = Document_request::with('document_requests', 'docTypes')->find($docReqId);

        if (!$docReq) {
            // Handle docReq not found
        }

        return response()->json($docReq);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $document_request = Document_request::findOrFail($id);

        $request->validate([
            'client_id' => ['required', 'integer',],
            'document_type_id' => ['required', 'integer'],
        ]);

        $document_request->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return response()->json(['message' => 'Document request updated!'])->setStatusCode(200);
    }

    public function destroy(string $id): JsonResponse
    {
        $document_request = Document_request::findOrFail($id);

        $document_request->delete();

        return response()->json(['message' => 'Document request Deleted!'])->setStatusCode(204);
    }
}
