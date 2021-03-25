<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function insert(Request $request)
    {
        $menuModel = new Menu();
        $menuModel->href = $request->get('href');
        $menuModel->title = $request->get('title');

        try {
            $menuModel->insert();
            return redirect(route(asset('/admin/menu')))->with("success", "User successfully added!");
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    public function delete($id)
    {
        $remove = new Menu();
        $remove->delete($id);
        return redirect()->route('menu');
    }
}
