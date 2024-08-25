<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{

    public function books($id)
    {
        $books = Library::where('Classroom_id', $id)->get();
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
