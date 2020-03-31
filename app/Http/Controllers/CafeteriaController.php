<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use DB;

class CafeteriaController extends Controller
{
    public function index()
    {
        $menu = new Menu();
        $menuData = $menu
            ->all();

        return view('cafeteria.index', ['menuData' => $menuData]);
    }
}
