@extends('layouts.master')
@section('css')

@section('title')
    الاقسام
@stop
@endsection

@section('content')
@include('partial.error')
     {{-- @include('backend.massage') --}}
      <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> الاقسام</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">الاعدادات</a></li>
                    <li class="breadcrumb-item active">الاقسام</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">
                                <i class="fa fa-amazon"></i>
                                اضافه قسم جديد
                            </button>
                            <a href="{{route('products.create')}}" class="btn btn-info" role="button" aria-pressed="true">
                                <i class="fa fa-shopping-basket"></i>
                                اضافه منتج جديد
                            </a>
                        </div>
                        @include('backend.sections.create')
                    </div>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم القسم</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$section->name}}</td>
                                    <td>{{$section->notes == true ? $section->notes : 'لا توجد ملاحظات'}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" title="تعديل" data-toggle="modal"
                                                data-target="#Editcategorie{{$section->id}}"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="حذف" data-toggle="modal"
                                                data-target="#Deleted{{$section->id}}"><i class="fa fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>

                            @include('backend.sections.edit')
                            @include('backend.sections.deleted')
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')



@endsection
