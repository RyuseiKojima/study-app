<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Clip;
use App\Models\Site;
use App\Models\Category;
use App\Models\ClipCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ClipStoreRequest;
use App\Http\Requests\ClipUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clip $clips)
    {
        $user = Auth::user();
        $allClips = $clips->getOrderBy();
        $yourClips = $clips->yourClips($user['id']);
        return view('clips.index')->with(['allClips' => $allClips, 'yourClips' => $yourClips]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Site $sites, Category $categories)
    {
        $user = Auth::user();
        $getSites = $sites->getSites();
        $getCategories = $categories->getCategories();
        return view('clips.create')->with(['user' => $user, 'sites' => $getSites, 'categories' => $getCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // clipを保存
        $clip = new Clip();
        $clip->fill($request->all());
        $clip->save();

        $clipCategory = new ClipCategory();
        $clipCategory->fill($request->all());
        $clipCategory->save();

        Clip::create($request->validated());
        return redirect()->route('clips.index')->with('message', 'クリップの作成が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function show(Clip $clip)
    {
        return view('clips.show', compact('clip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function edit(Clip $clip)
    {
        $user = Auth::user();
        return view('clips.edit')->with(['clip' => $clip, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function update(ClipUpdateRequest $request, Clip $clip)
    {
        $clip->update([
            'title' => $request->title,
            'url' => $request->url,
            'site' => $request->site,
            'category' => $request->category,
            'memo' => $request->memo
        ]);

        return redirect()->route('clips.index')->with('message', 'クリップの更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clip $clip)
    {
        $clip->delete();
        return redirect()->route('clips.index')->with('message', 'クリップの削除が完了しました。');
    }
}
