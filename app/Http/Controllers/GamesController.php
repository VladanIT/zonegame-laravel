<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GamesController extends Controller
{
    public function store(Request $request)
    {
        $gameModel = new Games();
        $gameModel->title = $request->get('title');
        $gameModel->description = $request->get('description');
        $gameModel->price = $request->get('price');

        $file = $request->file('picture-profil');
        $directory = public_path("images/games/");
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($directory, $fileName);

        $gameModel->profile = "images/games/".$fileName;

        $file = $request->file('picture-cover');
        $directory = public_path("images/games/cover/");
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($directory, $fileName);

        $gameModel->cover = "images/games/cover/".$fileName;
        

        try {
            $gameModel->insert();
            return redirect(route('admin-games'));
        } catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Desila se greska pri unosu, pokusajte kasnije.');
        }
    }

    public function delete($id)
    {
        $remove = new Games();
        $remove->delete($id);
        return redirect()->route('admin-games');
    }

}
