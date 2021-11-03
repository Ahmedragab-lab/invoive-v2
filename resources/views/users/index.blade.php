@extends('layouts.master')
@section('css')
  @section('title')
       addmin list
  @stop
@endsection

@section('content')
@include('partial.error')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> admin list</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">admin list</li>
            </ol>
        </div>
        <div class="col-md-6">

            <a href="{{ route('users.create') }}"  class="btn btn-primary btn-block"><i class="fa fa-user-circle"></i> Add admin</a>
        </div>
    </div>
</div>
{{-- @can('اضافة مستخدم') --}}
{{-- @endcan --}}
<!-- row opened -->
<div class="row ">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-striped table-bordered p-0" id="datatable" >
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                <th class="wd-20p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=0; @endphp
                            @foreach ($data as $key => $user)
                            @php $count++; @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ asset('uploads/user-img/'.$user->image) }}" class="img-thumbnail" width="70" alt=""></td>
                                    <td>
                                        @if ($user->status == 'active')
                                            <h5 class="text-success d-flex">{{ $user->status }}</h5>
                                        @else
                                            <h5 class="text-danger d-flex">{{ $user->status }}</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->roles_name as $v)
                                                <h5><label class="badge badge-success">{{ $v }}</label></h5>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            {{-- @can('تعديل مستخدم') --}}
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-info">{{ __('Edit') }}</a>
                                            {{-- @endcan --}}
                                            {{-- @can('حذف مستخدم') --}}
                                            <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this admin?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                            {{-- @endcan --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--/div-->

    <!-- Modal effects -->
    {{-- <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('users.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div> --}}



@endsection
@section('js')

@endsection
