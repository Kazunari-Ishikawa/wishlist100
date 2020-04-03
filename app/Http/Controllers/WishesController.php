<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateItemRequest;
use App\Item;
use App\Wish;

class WishesController extends Controller
{
    // TOPページ
    public function index()
    {
        return view('index');
    }
    // マイページ、リスト表示
    public function mypage()
    {
        $user = Auth::user();
        $items = Wish::find(Auth::id())->items;

        return view('wishes.mypage', ['user' => $user, 'items' => $items]);
    }
    // 新規作成機能
    public function create(CreateItemRequest $request)
    {
        $item = new Item;
        $wish = Wish::find(Auth::id());

        $item->wish()->associate($wish);
        $item->fill($request->all())->save();

        return response($item);
    }
    // 編集機能
    public function update(CreateItemRequest $request, $id)
    {
        $item = Item::find($id);
        // リクエストとDBが一致しなければ変更
        if ($request->category_id !== $item->category_id) {
            $item->category_id = $request->category_id;
        };
        if ($request->text !== $item->text) {
            $item->text = $request->text;
        }
        $item->save();

        return response($item);
    }
    // 削除機能
    public function destroy($id)
    {
        $item = Item::find($id)->delete();

        return response(200);
    }
    // ItemをDone状態にする
    public function done($id)
    {
        $item = Item::find($id);
        $item->done_flg = true;
        $item->save();

        return response($item);
    }
    // ItemをWish状態にする
    public function wish($id)
    {
        $item = Item::find($id);
        $item->done_flg = false;
        $item->save();

        return response($item);
    }
    // Items取得
    public function fetchItems()
    {
        $items = Wish::find(Auth::id())->items;

        return response($items);
    }
}
