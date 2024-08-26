@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->description }}</p>

        <!-- عرض ملف PDF باستخدام <iframe> -->
        <iframe src="{{ asset('attachments/library/' . $book->file_name) }}" width="100%" height="600px"></iframe>

        <a href="{{ route('student_books', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Back to Library</a>
    </div>
@endsection
