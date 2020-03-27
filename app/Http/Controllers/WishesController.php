<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishesController extends Controller
{
    public function index()
    {
        return view('wishes.index');
    }
}
