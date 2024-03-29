<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class UploadImageController extends Controller
{

    public function index(Request $request)
    {
        $sort_by = $request->input('name', 'created_at');
        $order_by = $request->input('order', 'asc');

        if ($sort_by === 'name' || $sort_by === 'created_at') {
            $images = Image::orderBy($sort_by, $order_by)->get();
        } else {
            $images = Image::all();
        }
        return view('images', compact('images'));
    }

    public function create(Request $request)
    {
        if (!$request->hasFile('images')) {
            flash('Загрузите файлы')->error();
            return redirect()->back();
        } else {
            if (count($request->file('images')) > 5) {
                flash('Можно загрузить не более 5 изображений')->error();
                return redirect()->back();
            } else {

                $request->validate([
                    'images.*' => 'image|max:2048'
                ]);

                $uploadDir = public_path('images');

                foreach ($request->file('images') as $image) {

                    $originalName = $image->getClientOriginalName();

                    $originalName = str_replace('png', '', $originalName);
                    $transliteratedName = Str::lower(Str::slug($originalName, '_')) . '.' . $image->getClientOriginalExtension();

                    while (file_exists($uploadDir . '/' . $transliteratedName)) {
                        $transliteratedName = Str::lower(uniqid()) . '.' . $image->getClientOriginalExtension();
                    }

                    $image->move($uploadDir, $transliteratedName);

                    Image::create([
                        'name' => $transliteratedName,
                        'upload_date' => now()
                    ]);
                }
                flash('Успешно загружено')->success();
                return redirect()->back();
            }
        }
    }


    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('original-image', compact('image'));
    }


    public function downloadImage($id)
    {
        $image = Image::findOrFail($id);
        $filePath = public_path('images/' . $image->name);

        return response()->download($filePath);
    }

}
