<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid(). "." . $imagen->extension();

        $imagenServidro = Image::make($imagen);
        $imagenServidro ->fit(1000,1000);

        $imagenPath = public_path('uploads'). '/' . $nombreImagen;
        $imagenServidro->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen()]);
    }
}
