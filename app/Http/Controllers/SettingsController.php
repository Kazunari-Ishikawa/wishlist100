<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function account()
    {
        return view('settings.account');
    }

    public function list()
    {
        return view('settings.list');
    }
}
