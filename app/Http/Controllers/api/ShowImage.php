<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Image;

class ShowImage extends Controller
{
    public function index() : object
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function find($id) : object
    {
        $image = Image::findOrFail($id);
        return response()->json($image);
    }
}
