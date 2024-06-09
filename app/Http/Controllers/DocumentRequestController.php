<?php

namespace App\Http\Controllers;

use App\Models\Document_request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class DocumentRequestController extends Controller
{
    public function index(): View
    {
        $document_requests = Document_request::all();

        return view('document_request.index', ['document_requests' => $document_requests]);
    }

    public function create(): View
    {
        return view('document_request.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'client_id' => ['required', 'integer', ],
            'document_type_id' => ['required','integer'],
        ]);

        Document_request::create([
            'client_id' => $request->client_id,
            'document_type_id' => $request->document_type_id,

        ]);

        return redirect(route('document_request.index', absolute: false));
    }
    public function show($docReqId): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $docReq = Document_request::with('document_requests', 'docTypes')->find($docReqId);

        if (!$docReq) {
            // Handle docReq not found
        }

        return view('document_request.show', compact('docReq'));
    }

    public function edit(string $id): View
    {
        $document_request = Document_request::findOrFail($id);
        return view('document_request.create', [
            'document_request' => $document_request,
        ]);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $document_request = Document_request::findOrFail($id);
        if (! Gate::allows('alter-request', $document_request)) {
            abort(403);
        }
        $request->validate([
            'client_id' => ['required', 'integer', ],
            'document_type_id' => ['required','integer'],

        ]);

        $document_request->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone
        ]);

        return redirect(route('document_request.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $document_request = Document_request::findOrFail($id);
        if (! Gate::allows('alter-request', $document_request)) {
            abort(403);
        }
        $document_request->delete();

        return redirect(route('document_request.index', absolute: false))->with('success', 'Document_Request deleted successfully');
    }

}
