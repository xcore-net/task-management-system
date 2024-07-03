<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class ApiFilesController extends Controller
{
    public function uploadFile(Request $request)
    {if ($request->hasFile('file')) {
        $file = $request->file('file');
        //in folder thumbs in public 
        $fileName = $file->getClientOriginalName(); 
        $filePath = $file->storeAs('thumbs',$fileName, 'public');
    

       // Storage::disk('local')->put($file->getClientOriginalName(), file_get_contents($file));
        return response()->json(['message' => 'File uploaded successfully','path'=>$filePath], 200);
    } else {
        return response()->json(['message' => 'No file uploaded'], 400);
    }
}}
