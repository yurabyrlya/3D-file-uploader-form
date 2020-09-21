<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{

  function store(Request $request){

      // checking if the uploaded file is correct
      $validation = $request->validate([
          'objFile' => 'required|file|'
          // 'objFile' => 'required|file|mimes:stl' // this validation didnt work...
      ]);

      // Check the extension of client file is STL
      $ext = $request->file('objFile')->getClientOriginalExtension();
      if (strtolower($ext) !== 'stl') {
          return view('form-upload')->withErrors(['The Extension must be .STL']);
      }

      $objFile = $validation['objFile']; // get the validated file
      $fileName = $objFile->getClientOriginalName();

      // save file to disk public with original client name
      Storage::disk('public')->putFileAs('geomiq/', $objFile, $fileName);

      return view('form-upload')->with(['modelStl' => 'storage/geomiq/'.$fileName
          , 'message'=>'object file uploaded']);
  }
}
