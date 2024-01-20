<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * 認証の試行を処理
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */

  public function adminLogin(Request $request)
  {
    $credentials = $request->validate([ //入力内容のチェック
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::guard('admin')->attempt($credentials)) { //ログイン試行（attemptは認証が成功すればtrue）
      if ($request->user('admin')?->admin_level > 0) { //管理者レベルがゼロでないか（?->は左がnullならそれを返す）
        $request->session()->regenerate(); //セッション更新
        return redirect()->indended('admin/dashboard'); //ダッシュボードへ
      } else {
        Auth::guard('admin')->logout(); //if文のログイン試行をキャンセル
        $request->session()->regenerate();
      }
    }
  }
}
