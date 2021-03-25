<?php

namespace App\Http\Controllers;
use App\Models\Games;
use App\Models\Gallery;
use App\Models\Menu;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $menus = new Menu();
        $this->data['menus'] = $menus->getAll();
    }

    public function index(){
        return view('front.pages.home', $this->data);
    }
    
    public function games(){
        $game = new Games();
        $this->data['games'] = $game->getAll();
        return view('front.pages.games', $this->data);
    }
    
    public function game($id, Request $request){
        $game = new Games();
        $game->id = $id;
        $this->data['games'] = $game->getGame();
        return view('front.pages.game', $this->data);
    }
    
    public function gallery(){
        $picture = new Gallery();
        $this->data['pictures'] = $picture->getAll();
        return view('front.pages.gallery', $this->data);
    }
    
    public function login(){
        return view('front.pages.login', $this->data);
    }
    
    public function registracion(){
        return view('front.pages.register', $this->data);
    }
    
    public function autor(){
        return view('front.pages.autor', $this->data);
    }
    
    public function contact(){
        return view('front.pages.contact', $this->data);
    }

    public function search(Request $request)
    {
        $gameModel = new Games();
        $gameModel->title = $request->get('search');

        $this->data['game'] = $gameModel->getGameByTitle();
        return view('front.pages.gameSearch', $this->data);

    }
}
