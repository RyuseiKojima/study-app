<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RelationshipController extends Controller
{
    public function store(int $userId)
    {
        $user = Auth::user();
        DB::beginTransaction();
        $relationship = new Relationship();
        $relationship->fill([
            'following_user_id' => $user->id,
            'followed_user_id' => $userId,
        ]);
        $relationship->save();
        DB::commit();
        // dd($relationship);

        return back()->withInput();
    }

    public function destroy($userId)
    {
        $user = Auth::user();
        $like = Relationship::where([
            ['following_user_id', '=', $user->id],
            ['followed_user_id', '=', $userId],
        ])
            ->first();
        $like->delete();
        return back()->withInput();
    }
}
