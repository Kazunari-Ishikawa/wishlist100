<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use App\Wish;
use App\Item;

class SettingsController extends Controller
{
    // アカウント設定表示
    public function account()
    {
        return view('settings.account');
    }
    // アカウント情報変更機能
    public function update(UserUpdateRequest $request, $id)
    {
        if(!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', 'エラーが発生しました');
        }
        $user = User::find($id);
        $formData = $request->all();
        unset($formData['_token']);
        $user->fill($formData)->save();

        return redirect('/mypage')->with('flash_message', 'アカウント情報を更新しました');
    }
    // パスワード変更機能
    public function change_pass(ChangePasswordRequest $request, $id)
    {
        // DB情報と入力値が一致しているか確認する
        if(!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect('/settings/account')->with('flash_message', '現在のパスワードが違います');
        }
        // ハッシュ化して保存
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/settings/account')->with('flash_message', 'パスワードを変更しました');
    }
    // 退会機能
    public function withdraw($id)
    {
        if(!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', 'エラーが発生しました');
        }
        if (Auth::id() != $id) {
            return redirect('/mypage')->with('flas_message', 'エラーが発生しました');
        }

        $user = User::find($id);
        $wish = Wish::find($user->id);
        $items = Item::where('wish_id', $wish->id)->get();
        foreach($items as $item) {
            $item->delete();
        }
        $wish->delete();
        $user->delete();
        Auth::logout();

        return redirect('/');
    }
    // リスト設定表示
    public function list()
    {
        return view('settings.list');
    }
}
