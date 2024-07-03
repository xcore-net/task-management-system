<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiStorageFileController extends Controller
{
    public function upload(Request $request)
    {
    //    $file = $request->file('file')->store('public/thumbs');
    //    return['file'=>$file];

    try {
        if ($request->hasFile('file')) {
            // in folder thumbs in public 
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName(); 
            $filePath = $file->storeAs('thumbs', $fileName, 'public');
            
            return response()->json(['message' => 'File uploaded successfully', 'path' => $filePath], 200);
        } else {
            return response()->json(['message' => 'No file uploaded'], 400);
        }
    } catch (Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

public function download($filename)
{
    $filePath = public_path("storage/thumbs/{$filename}");
    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return response()->json(['message' => 'File not found'], 404);
    }
}


public function copyFile(Request $request)
    {
        try {
            $sourcePath = $request->input('storage/thumbs');
            $destinationPath = $request->input('storage/thumbs');

            if (Storage::disk('public')->exists($sourcePath)) {
                Storage::disk('public')->copy($sourcePath, $destinationPath);
                return response()->json(['message' => 'File copied successfully'], 200);
            } else {
                return response()->json(['message' => 'Source file not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function deleteFile(Request $request)
    {
        try {
            $filePath = $request->input('file');

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
                return response()->json(['message' => 'File deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'File not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
