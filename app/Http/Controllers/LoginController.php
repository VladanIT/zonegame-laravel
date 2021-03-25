<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\ReportModel;
use DateTime;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $userModel = new UserModel();
        $userModel->email = $request->get("email");
        $userModel->password = $request->get("password");
        $user = $userModel->login();
        if ($user) {
            $request->session()->put('user', $user);
            
            // Upis logovanja u aktivnosti

            $report = new ReportModel();
            $report->id = $user->id_user;
            $report->aktivnost = "Login";
            $report->time = new DateTime();
            $report->store();

            // Kraj upisa

            return $user->role == "Admin" ? redirect(route("admin-home")) : redirect(route("games"));
        } else {
            return redirect()->back()->with("warning", "Wrong username or password.");
        }
    }

    public function logout()
    {
        // Upis logovanja u aktivnosti

        $report = new ReportModel();
        $report->id = session()->get('user')->id_user;
        $report->aktivnost = "Logout";
        $report->time = new DateTime();
        $report->store();

        // Kraj upisa

        session()->forget('user');
        return redirect(route('home'));
    }

    public function register(Request $request)
    {
        //Definisanje pravila za validaciju
        $rules = [
            'firstname' => 'required|alpha|min:2|max:20',
            'lastname' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];

        //Kastomizacija poruka
        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.'
        ];

        //Primena validacije, ukoliko je ima grešaka vrši se redirekcija requesta- na prethodnu stranu sa sve greškama
        // $validator = \Validator::make($request->all(), $rules, $messages);
        // $validator->validate();

        // Ukoliko je validacija uspesna, korisnik se upisuje u bazu

        $userModel = new UserModel();
        $userModel->first_name = $request->get("firstname");
        $userModel->last_name = $request->get("lastname");
        $userModel->email = $request->get("email");
        $userModel->password = $request->get("password");
        $userModel->username = $request->get("username");
        $userModel->role_id = 2;

        try {
            $userModel->insert();
            
            // Upis logovanja u aktivnosti

            // $report = new ReportModel();
            // $report->id = $user->id_user;
            // $report->aktivnost = "Registracija";
            // $report->time = new DateTime();
            // $report->store();

            // Kraj upisa

            return redirect(route("home"));
        } catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect(route("register"));
        }
    }
}
