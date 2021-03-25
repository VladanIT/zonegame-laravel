<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Gallery {

    public $title;
    public $picture;

    public function getAll()
    {
        $result = DB::table('gallery')
                ->select('*')
                ->get();
        return $result;
    }

    public function insert()
    {
        $result = DB::table('gallery')
            ->insert([
                'href' => $this->picture,
                'alt' => $this->title
            ]);
        return $result;
    }

    public function delete($id)
    {
        $result = DB::table('gallery')
            ->where('id', $id)
            ->delete();
        return $result;
    }
}
