<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('file')) {
     
            //get filename with extension
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
     
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
     
            //Upload File to s3
            Storage::disk('s3')->put('files/'.$fileNameToStore, fopen($request->file('file'), 'r+'), 'public');
     
            //your code to store $fileNameToStore in the database

            //dd($fileNameToStore);
        }

        return view('fileUpload', [ 'filename' => $fileNameToStore]);

    }
}
