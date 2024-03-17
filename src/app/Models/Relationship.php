<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['following_user_id', 'followed_user_id'];

    protected $table = 'relationships';
}
