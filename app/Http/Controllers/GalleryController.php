<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $galleryModel = new Gallery();
        $galleryModel->title = $request->get('title');

        $file = $request->file('picture');
        $directory = public_path("images/gallery/");
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($directory, $fileName);

        $galleryModel->picture = "images/gallery/".$fileName;
        

        try {
            $galleryModel->insert();
            return redirect(route('admin-gallery'));
        } catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Desila se greska pri unosu, pokusajte kasnije.');
        }
    }

    public function delete($id)
    {
        $remove = new Gallery();
        $remove->delete($id);
        return redirect()->route('admin-gallery');
    }
}
