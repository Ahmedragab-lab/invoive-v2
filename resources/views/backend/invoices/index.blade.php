@extends('layouts.master')
@section('css')

@endsection
@section('title')
    قائمه الفواتير
@endsection

@section('content')
@include('partial.error')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> قائمه الفواتير</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">قائمه الفواتير</a></li>
                    <li class="breadcrumb-item active">الفواتير</li>
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
                            <a href="{{route('invoices.create')}}" class="btn  btn-primary">اضافه فاتوره جديده</a>
                        </div>
                    </div>

                    <div class="table-responsive ">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">

                                    <thead >
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الفاتوره</th>
                                        <th>تاريخ الفاتوره</th>
                                        <th>القسم</th>
                                        <th>المنتج</th>
                                        <th>الكميه</th>
                                        <th>السعر</th>
                                        <th>الخصم</th>
                                        <th>الصافى بعد الخصم</th>
                                        <th>نسبة الضريبة %</th>
                                        <th>قيمة الضريبه</th>
                                        <th>الاجمالي</th>
                                        <th>حالة الفاتورة</th>
                                        <th>ملاحظات</th>
                                        <th class="alert alert-danger">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ( $invoices as $invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $invoice->invoice_number }}</td>
                                                <td>{{ $invoice->invoice_date }}</td>
                                                <td>{{ $invoice->section->name }}</td>
                                                <td>{{ $invoice->product->name }}</td>
                                                <td>{{ $invoice->q }}</td>
                                                <td>{{ $invoice->price }}</td>
                                                <td>{{ $invoice->discount }}</td>
                                                <td>{{ $invoice->net }}</td>
                                                <td>{{ $invoice->tax_rate }}%</td>
                                                <td>{{ $invoice->tax_value }}</td>
                                                <td>{{ $invoice->total }}</td>
                                                <td class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>
                                                    {{$invoice->status == 1 ? 'unpaid':'paid'}}
                                                </td>
                                                <td>{{$invoice->notes == true ? $invoice->notes: 'لا توجد ملاحظات'}}</td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Invoice ({{ $invoice->invoice_number }})
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(581px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a href="{{route('invoices.show',$invoice->id)}}" class=" dropdown-item"
                                                                title="details" role="button" aria-pressed="true">
                                                                  <span class="btn btn-primary btn-sm"><i class="fa fa-window-restore"></i> details</span>
                                                            </a>
                                                            <a href="{{route('invoices.edit',$invoice->id)}}" class="btn btn-info btn-sm dropdown-item"
                                                                title="تعديل" role="button" aria-pressed="true">
                                                                <span class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</span>
                                                            </a>
                                                            <button class="btn btn-danger btn-sm dropdown-item" data-invoice_id="{{$invoice->id}}"
                                                                    data-toggle="modal" data-target="#deletedinvoice">
                                                                    <span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</span>
                                                            </button>
                                                        </div>
                                                      </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                         </div>
                   </div>

                </div>

        @include('backend.invoices.deleted')
    </div>

    <!-- row closed -->
    <div class="accordion plus-icon shadow">
        <div class="acd-group">
            <div  class="acd-heading">ddd</div>
            <div class="acd-des" style="display: none;">ddddddddddddddddddddddddddddd</div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $('#deletedinvoice').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var invoice_id = button.data('invoice_id')
        var modal = $(this)
        modal.find('.modal-body #invoice_id').val(invoice_id);
    })
</script>
@endsection
