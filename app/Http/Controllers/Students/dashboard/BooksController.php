<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{

    public function books($id)
    {
        $student = Auth::user();
        $grade = $student->Grade_id;
        $classroom = $student->Classroom_id;
        $books = Library::where('Grade_id', $grade)
            ->where('Classroom_id', $classroom)
            ->get();
        return view('pages.Students.dashboard.library.books', compact('books'));
    }
    

    public function viewAttachment($file_name)
    {
        $book = Library::where('file_name', $file_name)->firstOrFail();
        return view('pages.Students.dashboard.library.view', compact('book'));
    }

    public function downloadAttachment($filename)
    {
        return response()->download(public_path('attachments/library/' . $filename));
    }
}
