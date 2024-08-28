@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ __('main_trans.List_books') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ __('main_trans.List_books') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('library.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ __('dashboard.Add_New_Book') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard.Name_Book') }}</th>
                                            <th>{{ __('Teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->teacher->Name }}</td>
                                                <td>{{ $book->grade->Name }}</td>
                                                <td>{{ $book->classroom->Name_Class }}</td>
                                                <td>{{ $book->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('downloadAttachment', $book->file_name) }}"
                                                        title="download" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="ti-download "></i></a>

                                                    <a href="{{ route('viewBooks', $book->file_name) }}" title="view"
                                                        class="btn btn-success btn-sm" role="button"
                                                        aria-pressed="true"><i class="fas fa-eye"></i></a>

                                                        <a href="{{ route('library.edit', $book->id) }}" title="edit"
                                                            class="btn btn-success btn-sm" role="button"
                                                            aria-pressed="true"><i class="fas fa-edit"></i></a>

                                                        {{-- <a href="{{ route('library.edit', $book->id)  }}"
                                                        class="btn btn-outline-info btn-sm" role="button"
                                                       
                                                        data-target="#">{{ trans('Sections_trans.Edit') }}</a> --}}
                                                     <a href="#"
                                                        class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete{{ $book->id }}">{{ trans('Sections_trans.Delete') }}</a>
                                                </td>
                                            </tr>

                                             <!-- delete_modal_Grade -->
                                             <div class="modal fade"
                                             id="delete{{ $book->id }}"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            delete Book
                                                        </h5>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                        <span
                                                            aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('library.destroy',  $book->id) }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            {{ trans('Sections_trans.Warning_Section') }}
                                                            <input id="id" type="hidden"
                                                                   name="id"
                                                                   class="form-control"
                                                                   value="{{ $book->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
