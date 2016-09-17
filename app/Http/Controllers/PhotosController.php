<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class PhotosController extends Controller
{
    public function destroy($id){
        Photo::findOrFail($id)->delete();
        
        return back();
    }
}
