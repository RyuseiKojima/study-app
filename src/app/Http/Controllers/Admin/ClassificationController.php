<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classification;
use App\Http\Requests\ClassificationStoreRequest;
use App\Http\Requests\ClassificationUpdateRequest;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{
    public function create(Classification $classifications)
    {
        return view('admin.classifications.create', compact('classifications'));
    }

    public function store(ClassificationStoreRequest $request)
    {
        DB::beginTransaction();
        $classification = new Classification();
        $classification->fill($request->all());
        $classification->save();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', '区分の作成が完了しました。');
    }

    public function edit($id, Classification $classifications)
    {
        $classification = $classifications->getClassification($id);
        return view('admin.classifications.edit', compact('classification'));
    }

    public function update($id, ClassificationUpdateRequest $request, Classification $classifications)
    {
        $classification = $classifications->getClassification($id);
        DB::beginTransaction();
        $classification->update([
            'name' => $request->name,
        ]);
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', '区分の更新が完了しました。');
    }

    public function destroy($id, Classification $classifications)
    {
        $classification = $classifications->getClassification($id);
        DB::beginTransaction();
        $classification->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', '区分の削除が完了しました。');
    }
}
