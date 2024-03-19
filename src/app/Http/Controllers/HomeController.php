<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Clip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index(Clip $clips, User $users)
    {
        $user = Auth::user();
        $allClips = $clips->getAllClipsBuilder()->get();
        $yourClips = $clips->getAllClipsBuilder()->where('clips.user_id', $user->id)->get();
        $goodClips = $clips
            ->getAllClipsBuilder()
            ->whereHas('likes', function ($like) use ($user) {
                $like->where('user_id', $user->id);
            })
            ->get();
        $followerClips = $clips->getAllClipsBuilder()->whereIn('user_id', $users->getYourFollows())->get();
        $getYourLikes = $users->getyourLikes();
        $getYourFollows = $users->getYourFollows();

        return view('dashboard', compact(['allClips', 'yourClips', 'goodClips', 'followerClips', 'getYourLikes', 'getYourFollows']));
    }
}
