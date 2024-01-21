<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin; //追加
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/admin/home'; //ログイン後のリダイレクト先

  /**
   * 認証の試行を処理
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function adminLogin(Request $request)
  {
    $credentials = $request->validate([ // 入力内容のチェック
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::guard('admin')->attempt($credentials)) { // ログイン試行
      if ($request->user('admin')?->admin_level > 0) { // 管理権限レベルが0でないか
        $request->session()->regenerate(); // セッション更新

        return redirect()->intended('admin/dashboard'); // ダッシュボードへ
      } else {
        Auth::guard('admin')->logout(); // if文でログインしてしまっているので、ログアウトさせる

        $request->session()->regenerate(); // セッション更新

        return back()->withErrors([ // 権限レベルが0の場合
          'error' => 'You do not have permission to log in.',
        ]);
      }
    }

    return back()->withErrors([ // ログインに失敗した場合
      'error' => 'The provided credentials do not match our records.',
    ]);
  }
}
