<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request){
        $file_name = $request->file('audio')->getClientOriginalName();
        Storage::putFileAs('',$request->file('audio'), $file_name);
    }
}
