<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreGrades $request)
    {

        $validated = $request->validated();

        try {
            $validated = $request->validated();
            $Grade = new Grade();
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */
            $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->Notes = $request->Notes;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>
