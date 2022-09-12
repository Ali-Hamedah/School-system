<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;

class FeesRepository implements FeesRepositoryInterface
{
    public function index()
    {
        $fees = fee::all();
        return view('pages.Fees.index', compact('fees'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Fees.add', compact('Grades'));
    }

    public function edit($id)
    {
        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit', compact('fee', 'Grades'));
    }

    public function store($request)
    {
        try {
            $fees = new fee();
            $fees->amount = $request->amount;
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->Grade_id = $request->Grade_id;
            $fees->Classroom_id = $request->Classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->Fee_type = $request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update($request)
    {
        try {
            $fees = fee::findOrFail($request->id);
            $fees->amount = $request->amount;
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->Grade_id = $request->Grade_id;
            $fees->Classroom_id = $request->Classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->Fee_type = $request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        fee::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }
}
