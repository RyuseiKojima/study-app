<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function clips()
    {
        return $this->hasMany('App\Models\Clip');
    }

    // 1つのサイト情報を取得
    public function getSite($site_id)
    {
        $site = $this->where('id', $site_id)->first();
        return $site;
    }

    // サイトに属するクリップidを配列で取得
    public function getSites($id)
    {
        // カテゴリのクリップ情報を取得
        $clips =  $this::find($id)->clips;

        $getSites = [];
        // いいね情報からクリップIDを抽出し、配列に格納
        foreach ($clips as $clip) {
            array_push($getSites, $clip->id);
        }
        return $getSites;
    }
}
