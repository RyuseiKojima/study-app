<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// login周りのModelは以下で実装する必要あり
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
  use HasFactory;

  protected $table = 'admin_users';

  // createやupdateを受け付ける
  protected $fillable = [
    'name',
    'email',
    'password',
    'admin_level',
  ];

  // 秘匿性の高い属性に付与してJSONに含まれなくなる
  protected $hidden = [
    'password',
    'remember_token',
  ];

  // DBから得られたデータを自動変換する
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
