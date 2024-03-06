<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Clip;
use App\Models\Site;
use App\Models\Category;
use App\Models\CategoryClip;
use App\Http\Requests\ClipStoreRequest;
use App\Http\Requests\ClipUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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
        $allClips = Clip::with('site')
            ->with('user')
            ->with('categories')
            ->orderBy('updated_at', 'DESC')
            ->get();
        $yourClips = $clips->yourClips($user['id']);

        return view('clips.index')->with(['allClips' => $allClips, 'yourClips' => $yourClips]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $sites = Site::all();
        $categories = Category::all();
        return view('clips.create')->with(['user' => $user, 'sites' => $sites, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClipStoreRequest $request)
    {
        DB::beginTransaction();
        // clipを保存
        $clip = new Clip();
        $clip->fill($request->all());
        $clip->save();

        // 中間テーブルへの登録
        $clip->categories()->sync($request->category_id);
        DB::commit();

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
    public function edit($id)
    {
        $clip = Clip::with('categories')
            ->find($id);
        $user = Auth::user();
        $sites = Site::all();
        $categories = Category::all();
        return view('clips.edit')->with(['clip' => $clip, 'user' => $user, 'sites' => $sites, 'categories' => $categories]);
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
        dd($clip);
        DB::beginTransaction();
        // クリップテーブルをアップデート
        $clip->update([
            'title' => $request->title,
            'url' => $request->url,
            'site_id' => $request->site_id,
            'memo' => $request->memo
        ]);
        // 中間テーブルをアップデート
        $clip->categories()->sync($request->category_id);

        DB::commit();

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
