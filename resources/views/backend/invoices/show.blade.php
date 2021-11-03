@extends('layouts.master')
@section('css')

@endsection
@section('title')
    invoice details
@endsection

@section('content')

    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Invoice number <span style="color:rgb(228, 24, 24)">{{ $invoice->invoice_number }}</span></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
            <li class="breadcrumb-item active">Invoice </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="card mb-30">
      <div class="card-body container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-20"><img class="logo-small mt-0" src="{{ asset('assets/images/logo-dark.png') }}" alt="logo"></div>
            <ul class="addresss-info invoice-addresss list-unstyled">
               <li>17504 Carlton Cuevas Rd,<br>
               Gulfport, MS, 39503</li>
              <li><h5> invoice creator: </h5> <h6 style="color:rgb(12, 143, 99)">{{ auth()->user()->name }}</h6></li>
              <li><h5>Email of invoice creator: </strong> <h6 style="color:rgb(12, 143, 99)">{{ auth()->user()->email }}</h6></li>
              <li><strong>Phone: </strong> <a href="tel:7042791249"> +(704) 279-1249 </a></li>
              <li><strong>Fax: </strong>+(704) 213-7895 </li>
            </ul>
          </div>
          <div class="col-sm-6 text-left text-sm-right mb-5">
            <h4>Invoice Information</h4>
            <div>
             <p> Invoice No: <span style="color:rgb(228, 24, 24)">{{ $invoice->invoice_number }}</span> </p> <br>
              <h4><small>Invoice to:</small> Michael Bean</h4>
            </div>
            <ul class="addresss-info invoice-addresss list-unstyled">
              <li> 1234 North Avenue Luke Lane,<br>
              South Bend, IN 360001</li>
              <li><span><strong>Email: </strong> letstalk@webmin.com</span></li>
              <li><span><strong>Phone: </strong> <a href="tel:7042791249"> +(704) 279-1249 </a></span></li>
            </ul>
            <span>Invoice Date: February 20, 2018</span>
            <br>
            <span>Due Date: February 24, 2018</span>
          </div>
        </div>

        <div class="page-invoice-table table-responsive">
          <table class="table table-hover text-right">
            <thead>
              <tr>
                <th class="text-center">Invoice number</th>
                <th class="text-left">Section Name </th>
                <th class="text-left">Product Name</th>
                <th class="text-right">price of product</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Price</th>
                <th class="text-right">Discount</th>
                <th class="text-right">Tax Rate %</th>


              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">{{ $invoice->invoice_number }}</td>
                <td class="text-left">{{ $invoice->section->name }}</td>
                <td class="text-left">{{ $invoice->product->name }}</td>
                <td>{{ $invoice->product->price }}$</td>
                <td>{{ $invoice->q }}</td>
                <td>{{ $invoice->price }}$</td>
                <td>{{ $invoice->discount }}$</td>
                <td>{{ $invoice->tax_rate }}%</td>


              </tr>

              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-right clearfix mb-3 mt-2">
          <div class="float-right mt-30">
            <h6>Sub - Total amount: <strong style="color: rgb(231, 28, 28)">{{ $invoice->net }}$</strong></h6>
            <h6>Vat: <strong>{{ $invoice->tax_value }}$</strong></h6>
            <h6 class="grand-invoice-amount">Grand Total: <strong style="color: rgb(231, 28, 28)">{{ $invoice->total }}$</strong></h6>
            <h5>Status : <span class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>
                            {{$invoice->status == 1 ? 'غير مدفوعة':'تم الدفع'}}
                         </span>
            </h5>
          </div>
        </div>
        <div class="text-right">
          <a href="{{ route('invoices.index') }}" class="btn btn-basic xs-mb-10">
            <span>  back to invoices</span>
          </a>
          <button type="submit" class="btn btn-primary xs-mb-10">
            <span>  Proceed to payment</span>
          </button>
          <button type="button" class="btn btn-dark" onclick="javascript:window.print();">
            <span><i class="fa fa-print"></i> Print</span>
          </button>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="border p-4 mb-3"><strong>Note:</strong>
            {{ $invoice->notes }} {{ $invoice->status }}
          <strong class="mt-3 d-block">Thanks for your business</strong>

        </div>
      </div>
    </div>

@endsection
@section('js')

@endsection
