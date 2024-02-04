<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'clips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'url',
        'site',
        'category',
        'user_id',
        'memo',
    ];

    public function getOrderBy()
    {
        return $this->orderBy('updated_at', 'DESC')->get();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
