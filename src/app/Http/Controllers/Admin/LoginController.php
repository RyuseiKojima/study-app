<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin; //追加
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  public function index()
  {
    return view('admin.login.index');
  }

  public function login(Request $request)
  {
    // 認証情報の受け取り
    $credentials = $request->only(['email', 'password']);

    //ログイン実施
    if (Auth::guard('admins')->attempt($credentials)) {
      return redirect()->route('admin.dashboard')->with([
        'login_msg' => 'ログインしました。',
      ]);
    }

    return back()->withErrors([
      'login' => ['ログインに失敗しました。'],
    ]);
  }

  public function logout(Request $request)
  {
    Auth::guard('admins')->logout();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login.index')->with([
      'logout_msg' => 'ログアウトしました。',
    ]);
  }
}
