<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class CartModel{

    public function getAll()
    {
        $result = DB::table('cart')
                ->join('users', 'users.id_user', '=', 'cart.user_id')
                ->join('games', 'games.id', '=', 'cart.game_id')
                ->select('*')
                ->get();
        return $result;
    }
}