@extends('layouts.master')
@section('css')
  @section('title')
  permission
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">add permission</h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">add permission</li>
            </ol>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <a class="btn btn-primary " style="margin: 10px;" href="{{ route('roles.index') }}">رجوع</a>
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="col">
                                <div class="form-group">
                                    <p> Add permission :</p>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li><a href="#"> Permission</a></li>
                                    @foreach($permission as $value)
                                        <label
                                            style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /col -->
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary btn-block">تاكيد</button>
                            </div>
                        </div>
                    </div>
                </div>
    {!! Form::close() !!}
@endsection
@section('js')

@endsection
