<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Games {
    public $id;
    public $title;
    public $description;
    public $price;
    public $profile;
    public $cover;
    
    public function getAll()
    {
        $result = DB::table('games')
                ->select('*')
                ->get();
        return $result;
    }
    
    public function getGame()
    {
        $result = DB::table('games')
                ->select('*')
                ->where('id', $this->id)
                ->first();
        return $result;
    }

    public function insert()
    {
        $result = DB::table('games')
            ->insert([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'picture' => $this->profile,
                'cover' => $this->cover
            ]);
        return $result;
    }

    public function delete($id)
    {
        $result = DB::table('games')
            ->where('id', $id)
            ->delete();
        return $result;
    }

    public function getGameByTitle()
    {
        $result = DB::table('games')
                ->select('*')
                ->where('title', $this->title)
                ->orWhere('title', 'like','%'. $this->title.'%')
                ->get();
        return $result;
    }
}
