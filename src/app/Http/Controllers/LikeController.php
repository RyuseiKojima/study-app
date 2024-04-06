<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LikeController extends Controller
{
    public function store(int $clipId)
    {
        $user = Auth::user();
        DB::beginTransaction();
        $like = new Like();
        $like->fill([
            'clip_id' => $clipId,
            'user_id' => $user->id,
        ]);
        $like->save();
        DB::commit();

        return back()->withInput()->with('message', 'クリップをいいねしました。');
    }

    public function destroy($clipId)
    {
        $user = Auth::user();
        DB::beginTransaction();

        $like = Like::where([
            ['user_id', '=', $user->id],
            ['clip_id', '=', $clipId],
        ])
            ->first();
        $like->delete();
        DB::commit();

        return back()->withInput()->with('message', 'クリップのいいねを削除しました。');
    }
}
