@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{__('dashboard.Add_new_question')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{__('dashboard.Add_new_question')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('questions.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{__('dashboard.Question')}} </label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative" autofocus required>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{__('dashboard.Answers')}}</label>
                                    <textarea name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>

                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{__('dashboard.Right_answer')}} </label>
                                    <input type="text" name="right_answer" id="input-name"
                                        class="form-control form-control-alternative" autofocus required>
                                </div>
                                @error('right_answer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id">{{__('dashboard.Quiz_Name')}}: <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="quizze_id" required>
                                            <option selected disabled>  {{__('dashboard.choose')}}...</option>
                                            @foreach ($quizzes as $quizze)
                                                <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('quizze_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id">{{__('dashboard.Score')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="score" required>
                                            <option selected disabled>{{__('dashboard.choose')}}...</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                        @error('score')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
                                {{__('grades_trans.submit')}}
                            </button>
                        </form>
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
