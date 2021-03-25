<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ReportModel{

    public $id;
    public $aktivnost;
    public $time;

    public function getAll()
    {
        $result = DB::table('reports')
                ->join('users', 'users.id_user', '=', 'reports.user_id')
                ->get();
        return $result;
    }

    public function store()
    {
        $result = DB::table('reports')
            ->insert([
                'user_id' => $this->id,
                'aktivnost' => $this->aktivnost,
                'time' => $this->time
            ]);
        return $result;
    }
}