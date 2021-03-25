<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class UserModel
{
    // public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $role_id;
    public $email;
    public $password;
    // public $file;

    public function login()
    {
        $result = DB::table('users')
            ->join("roles", "users.id_role", "=", "roles.id")
            ->where([
                ['username', '=', $this->email],
                ['pass', '=', md5($this->password)]
            ])->select("users.*", "roles.role as role")
            ->get()->first();
        return $result;
    }

    public function insert()
    {
        $result = DB::table('users')
            ->insert([
                'ime' => $this->first_name,
                'prezime' => $this->last_name,
                'email' => $this->email,
                'pass' => md5($this->password),
                'username' => $this->username,
                'id_role' => $this->role_id
            ]);
        return $result;
    }

    public function getAll()
    {
        $result = DB::table('users')
            ->join("roles", "users.id_role", "=", "roles.id")
            ->select("users.*", "roles.role as role")
            ->get();
        return $result;
    }

    public function delete($id)
    {
        $result = DB::table('users')
            ->where('id_user', $id)
            ->delete();
        return $result;
    }
}