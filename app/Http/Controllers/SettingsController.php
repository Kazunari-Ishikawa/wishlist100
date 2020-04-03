<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // アカウント設定
    public function account()
    {
        return view('settings.account');
    }
    // リスト設定
    public function list()
    {
        return view('settings.list');
    }
}
