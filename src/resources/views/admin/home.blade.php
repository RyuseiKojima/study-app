@extends('layouts.admin')

<head>
  <title>管理者トップ</title>
</head>

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('管理者トップ') }}</div>
          @csrf


          <div class="card-body">
            @if (session('login_msg'))
              <p>{{ session('login_msg') }}</p>
            @endif
            @if (Auth::guard('admins')->check())
              <div>管理者{{ Auth::guard('admins')->user()->name }}がログイン中</div>
            @endif
            <ul>
              <li>管理者（Administrator）ログインユーザー: {{ Auth::guard('admins')->check() }}</li>
              <li>マイページ（members） ログインユーザー: {{ Auth::guard('web')->check() }}</li>
            </ul>
            <div class="mt-3">
              <a href="/admin/logout">ログアウト</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
