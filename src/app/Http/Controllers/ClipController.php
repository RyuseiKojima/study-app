<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Clip;
use Illuminate\Http\Request;

class ClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clip $clip)
    {
        return view('clips/index')->with(['clips' => $clip->getOrderBy()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function show(Clip $clip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function edit(Clip $clip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clip $clip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clip $clip)
    {
        //
    }
}
