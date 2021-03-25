<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Games;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\CartModel;
use App\Models\ReportModel;

class BackendController extends Controller
{
    private $data = [];

    public function home(){
        return view('admin.pages.home');
    }

    public function users(){
        $users = new UserModel();
        $this->data['users'] = $users->getAll();
        return view('admin.pages.users', $this->data);
    }

    public function games(){
        $games = new Games();
        $this->data['games'] = $games->getAll();
        return view('admin.pages.games', $this->data);
    }

    public function gallery(){
        $pictures = new Gallery();
        $this->data['pictures'] = $pictures->getAll();
        return view('admin.pages.gallery', $this->data);
    }

    public function menu(){
        $menus = new Menu();
        $this->data['menus'] = $menus->getAll();
        return view('admin.pages.menu', $this->data);
    }

    public function updatemenu()
    {
        return view('admin.pages.update-menu');
    }

    public function cart(){
        $cart = new CartModel();
        $this->data['carts'] = $cart->getAll();
        return view('admin.pages.cart', $this->data);
    }

    public function report(){
        $report = new ReportModel();
        $this->data['reports'] = $report->getAll();
        return view('admin.pages.report', $this->data);
    }
}
