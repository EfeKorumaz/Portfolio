<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleListController extends Controller
{
    public function index(): View
    {
        $modules = Module::orderBy('id', 'desc')->get();
        return view('modulelist', ['modules' => $modules]);
    }

}
