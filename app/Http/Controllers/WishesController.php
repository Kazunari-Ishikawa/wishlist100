<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateItemRequest;
use App\Item;

class WishesController extends Controller
{
    // TOPページ
    public function index()
    {
        return view('wishes.index');
    }
    // マイページ、やりたいこと表示
    public function mypage()
    {
        return view('wishes.mypage');
    }
    // マイページ、やったこと表示
    public function done_show()
    {
        return view('wishes.done_show');
    }
    // 新規作成表示
    public function new()
    {
        return view('wishes.new');
    }
    // やりたいこと編集表示
    public function edit()
    {
        return virw('wishes.edit');
    }
    // 新規作成機能
    public function create(CreateItemRequest $request)
    {
        $item = new Item;
        $wish = \App\Wish::find(\Auth::id());

        $item->wish()->associate($wish);
        $item->fill($request->all())->save();
        \Log::info($item);

        return response($item);
    }
    // 編集機能
    public function update()
    {

    }
    // 削除機能
    public function destroy()
    {

    }
}
