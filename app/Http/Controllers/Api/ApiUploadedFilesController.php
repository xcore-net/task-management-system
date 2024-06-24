<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadedFiles;
use Illuminate\Http\JsonResponse;

class ApiUploadedFilesController extends Controller
{
    public function index()
    {
        $uploadedFiles = UploadedFiles::all();
        return response()->json($uploadedFiles);
    }

    public function store(Request $request)
    {
        $uploadedFiles = new UploadedFiles();
        $uploadedFiles->client_id = $request->client_id;
        $uploadedFiles->filled_form_id = $request->filled_form_id;
        $uploadedFiles->save(); //save
        return response()->json(['message' => "file stored!"])->setStatusCode(201);
    }
    public function show(string $id)
    {
        $uploadedFile = UploadedFiles::findOrFail($id);

        return response()->json($uploadedFile);
    }

    public function update(Request $request, string $id)
    {
        $uploadedFile = UploadedFiles::findOrFail($id);

        $request->validate([
            'client_id' => ['required'],
            'filled_form_id' => ['required'],
        ]);

        $uploadedFile->update([
            'client_id' => $request->client_id,
            'filled_form_id' => $request->filled_form_id,
        ]);

        return response()->json(['message'=>'file updated!'])->setStatusCode(200);
    }

    public function destroy(string $id): JsonResponse
    {
        $uploadedFiles = UploadedFiles::findOrFail($id);
        $uploadedFiles->delete();

        return response()->json(['message'=>'file deleted!'])->setStatusCode(204);
    }
}
