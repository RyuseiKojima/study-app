<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Clip;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function show($id, Clip $clips, User $users): View
    {
        // $user_id = Auth::user()->id;

        // $clipsBuilder = $clips->getClipsBuilder();

        // dd($id);
        $getYourFollows = $users->getYourFollows($id);
        $getYourLikes = $users->getyourLikes($id);
        $getUser = $users->getUser($id);


        $yourClips = $clips->getYourClips($id);
        $followerClips = $clips->getFollowerClips($getYourFollows);
        $goodClips = $clips->getGoodClips($getYourLikes);

        return view('profile.show', compact(['id', 'getYourFollows', 'getYourLikes', 'getUser', 'yourClips', 'followerClips', 'goodClips']));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        DB::commit();


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        DB::beginTransaction();

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        DB::commit();


        return Redirect::to('/');
    }
}
