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
        $user = Auth::user();
        $allClips = $clips->getAllClips();
        $yourClips = $clips->getyourClips($user);
        $goodClips = $clips->getGoodClips($user);
        $getYourLikes = $users->getyourLikes($user);

        return view('dashboard')->with(['allClips' => $allClips, 'yourClips' => $yourClips, 'goodClips' => $goodClips, 'getYourLikes' => $getYourLikes]);
    }
}
