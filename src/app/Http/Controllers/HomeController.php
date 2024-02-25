<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clip;
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


    public function index(Clip $clips)
    {
        $user = Auth::user();
        $allClips = $clips->getOrderBy();
        $yourClips = $clips->yourClips($user['id']);
        return view('dashboard')->with(['allClips' => $allClips, 'yourClips' => $yourClips]);
    }
}
