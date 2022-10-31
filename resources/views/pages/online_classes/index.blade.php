@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{__('main_trans.Onlineclasses')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('main_trans.Onlineclasses')}}
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
                                <a href="{{route('online_classes.create')}}" class="btn btn-success" role="button"
                                   aria-pressed="true">{{__('dashboard.Add_new_online_share')}}</a>
                                <a class="btn btn-warning"
                                   href="{{route('indirect.create.admin')}}">{{__('dashboard.Add_new_offline_share')}}</a>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"

                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{__('dashboard.Grade')}}</th>
                                            <th>{{__('dashboard.Class')}}</th>
                                            <th>{{__('dashboard.Section')}}</th>
                                            <th>{{__('dashboard.Teacher')}}</th>
                                            <th>{{__('dashboard.Class_Title')}}</th>
                                            <th>{{__('dashboard.Start_Date')}}</th>
                                            <th>{{__('dashboard.Class_time')}}</th>
                                            <th>{{__('dashboard.Class_link')}}</th>
                                            <th>{{__('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_classe->grade->Name}}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{$online_classe->section->Name_Section}}</td>
                                                <td>{{$online_classe->created_by}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}"
                                                                           target="_blank">{{__('dashboard.Join_Now')}}</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{$online_classe->meeting_id}}">
                                                        <i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.online_classes.delete')
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
