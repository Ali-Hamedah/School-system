<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Library;
use App\Models\Classroom;
use App\Http\Traits\AttachFilesTrait;

class LibraryRepository implements LibraryRepositoryInterface
{

    use AttachFilesTrait;

    public function index()
    {
        $Grades = Grade::all();
        $list_Grades = Grade::all();
        $classrooms = Classroom::all();
        return view('pages.library.index', compact('Grades', 'list_Grades', 'classrooms'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create', compact('grades'));
    }

    public function store($request)
    {
        $validatedData = $request->validated();
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            $this->uploadFile($request, 'file_name', 'library');

            toastr()->success(trans('messages.success'));
            return redirect()->route('library.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $book = library::findorFail($id);
        return view('pages.library.edit', compact('book', 'grades', 'classrooms'));
    }

    public function books($grade, $classroom)
    {
        // استخدام المعرفات في الاستعلام
        $Grades = Grade::all();
        $books = Library::where('Grade_id', $grade)
            ->where('Classroom_id', $classroom)
            ->get();

        return view('pages.library.show', compact('books', 'Grades'));
    }

    public function update($request)
    {
        try {

            $book = library::findorFail($request->id);
            $book->title = $request->title;

            if ($request->hasfile('file_name')) {

                $this->deleteFile(Library::class, $request->id, 'attachments/library/');

                $this->uploadFile($request, 'file_name', 'library');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        return $this->deleteFile(Library::class, $id, 'attachments/library/');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/' . $filename));
    }

    public function viewAttachment($file_name)
    {
        $book = Library::where('file_name', $file_name)->firstOrFail();
        return view('pages.library.view', compact('book'));
    }
}
