<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Clip;
use Illuminate\Support\Facades\Auth;
use App\Library\BaseClass;

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
        $allClips = BaseClass::getAllClips($clips);
        $yourClips = BaseClass::getyourClips($clips, $user);

        return view('dashboard')->with(['allClips' => $allClips, 'yourClips' => $yourClips]);
    }
}
