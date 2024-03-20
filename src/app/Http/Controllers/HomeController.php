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
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Clip $clips, User $users)
    {
        $user_id = Auth::user()->id;
        $clipsBuilder = $clips->getClipsBuilder();

        $getYourFollows = $users->getYourFollows();
        $getYourLikes = $users->getyourLikes();

        $allClips = $clips->getAllClips();
        $yourClips = $clips->getYourClips($user_id);
        $followerClips = $clips->getFollowerClips($getYourFollows);
        $goodClips = $clips->getGoodClips($getYourLikes);

        return view('dashboard', compact(['getYourFollows', 'getYourLikes', 'allClips', 'yourClips', 'followerClips', 'goodClips']));
    }
}
