<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function insert(Request $request)
    {
        $userModel = new UserModel();
        $userModel->first_name = $request->get('firstname');
        $userModel->last_name = $request->get('lastname');
        $userModel->email = $request->get('email');
        $userModel->password = $request->get('password');
        $userModel->username = $request->get('username');
        $userModel->role_id = $request->get('role');

        try {
            $userModel->insert();
            return redirect(route('users'));
        } catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Desila se greska pri unosu, pokusajte kasnije.');
        }
    }

    public function delete($id)
    {
        $remove = new UserModel();
        $remove->delete($id);
        return redirect()->route('users');
    }

    
}
