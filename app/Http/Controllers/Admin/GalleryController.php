<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }

    public function gallery()
    {
        $gallerys=Gallery::latest()->get();
        $output="";
        foreach($gallerys as $gallery){
            foreach(json_decode($gallery->images) as $image){
                $img='http://127.0.0.1:8000/storage\\'.$image;
                $output .="<img src='{$img}' style='width:100%;height:126px' />";
            }
        }
        echo $output;
    }

    public function create(Request $request)
    {
        $gallery = new Gallery();
        $images = $request->file('files');
        $files = [];
        foreach ($images as $image) {
            $files[] = $image->store('gallery', 'public');
        }
        $gallery->images = json_encode($files);
        $result = $gallery->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
