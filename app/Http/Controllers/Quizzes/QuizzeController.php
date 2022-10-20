<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quizze;
use App\Repository\QuizzRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    protected $Quizz;

    public function __construct(QuizzRepositoryInterface $Quizz)
    {
        $this->Quizz = $Quizz;
    }

    public function index()
    {
        return $this->Quizz->index();
    }


    public function create()
    {
        return $this->Quizz->create();
    }


    public function store(Request $request)
    {
        return $this->Quizz->store($request);

    }


    public function show(Quizze $quizze)
    {
        //
    }


    public function edit($id)
    {
        return $this->Quizz->edit($id);

    }


    public function update(Request $request)
    {
        return $this->Quizz->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->Quizz->destroy($request);

    }

    public function student_quizze($quizze_id)
    {
        $degrees = Degree::where('quizze_id', $quizze_id)->get();
        return view('pages.Teachers.dashboard.Quizzes.student_quizze', compact('degrees'));
    }

    public function repeat_quizze(Request $request)
    {
        Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        toastr()->success('تم فتح الاختبار مرة اخرى للطالب');
        return redirect()->back();
    }


}
