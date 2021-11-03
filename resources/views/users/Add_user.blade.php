@extends('layouts.master')
@section('css')
  @section('title')
       add admin
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">add admin </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">add admin </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="card card-statistics mb-30">
            <div class="card-body">
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('users.index') }}">رجوع</a>
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row " style=" display: block;">
                            <div class="col-lg-6">
                                <label>اسم المستخدم: <span style="color:rgb(199, 8, 8)">*</span></label>
                                <input class="form-control " name="name"  type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>البريد الالكتروني: <span style="color:rgb(199, 8, 8)">*</span></label>
                                <input class="form-control " name="email"  type="email">
                            </div>
                            <div class="col-lg-6">
                                <label>كلمة المرور: <span style="color:rgb(199, 8, 8)">*</span></label>
                                <input class="form-control " name="password"  type="password">
                            </div>

                            <div class="col-lg-6">
                                <label> تاكيد كلمة المرور: <span style="color:rgb(199, 8, 8)">*</span></label>
                                <input class="form-control "name="confirm-password"  type="password">
                            </div>
                            <div class="col-lg-6">
                                <label>Add image :  <span style="color:rgb(199, 8, 8)">*</span></label>
                                <input class="form-control img" name="image"  type="file">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('uploads/user-img/default.jpg') }}" class="img-thumbnail img-preview" width="100" alt="">
                            </div>
                            <div class="col-lg-6">
                                <label >حالة المستخدم</label>
                                <select name="status"  class="form-control " style="height: calc(2.8rem + 7px); " >
                                    <option value="unactive">not active</option>
                                    <option value="active">active</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label > نوع المستخدم</label>
                                    {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary btn-block" type="submit">تاكيد</button>
                        </div>
                </form>
            </div>
        </div>


@endsection

