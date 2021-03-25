<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Menu{

    public $href;
    public $title;

    public function getAll()
    {
        $result = DB::table('menu')
                ->select('*')
                ->get();
        return $result;
    }

    public function insert()
    {
        $result = DB::table('menu')
            ->insert([
                'href' => '/'.$this->href,
                'title' => $this->title
            ]);
        return $result;
    }

    public function delete($id)
    {
        $result = DB::table('menu')
            ->where('id', $id)
            ->delete();
        return $result;
    }
}