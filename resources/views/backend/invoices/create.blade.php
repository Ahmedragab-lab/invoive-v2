@extends('layouts.master')

@section('title')
    اضافة فاتورة جديدة
@endsection

@section('css')

@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> اضافة فاتورة جديدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">قائمة الفواتير</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">



            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>رقم الفاتوره</label>
                                <input type="hidden" name="val" value="Unpaid">
                                <input type="text" name="invoice_number" value="{{ old('invoice_number') }}"
                                    class="form-control @error('invoice_number') is-invalid @enderror" required>
                                @error('invoice_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>تاريخ الفاتوره</label>
                                <input class="form-control" type="text" id="datepicker-action" name="invoice_date"
                                    data-date-format="yyyy-mm-dd" title="يرجي ادخال تاريخ الفاتورة" required>
                                @error('invoice_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>الاقسام</label>
                                <select name="section" class="form-control p-1  @error('section') is-invalid @enderror" required>
                                    <option value="" disabled selected> -- اختر من قسم --</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>المنتجات</label>
                                <select name="product_id" class="form-control p-1 @error('product_id') is-invalid @enderror">
                                    <option value="" disabled selected> -- اختر منتج --</option>


                                </select>
                                @error('product_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>الكميه</label>
                                <input type="text" name="q" id="q" placeholder="--ادخل الكميه--" onkeyup="myFunction3()"

                                    class="form-control @error('amount_collection') is-invalid @enderror">
                                @error('q')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>سعر المنتج</label>
                                <input type="text" name="price" id="price" placeholder="سعر المنتج" readonly

                                    class="form-control @error('amount_collection') is-invalid @enderror">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>الخصم</label>
                                <input type="number" name="discount" value="0" id="discount" onkeyup="myFunction2()"
                                  placeholder="برجاء ادخال قيمه الخصم"
                                    class="form-control @error('discount') is-invalid @enderror" required>
                                @error('discount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>السعر بعد الخصم</label>
                                <input type="number" name="net" name="total_after_discount" id="total_after_discount" value="0" readonly
                                    class="form-control @error('net') is-invalid @enderror" >
                                @error('net')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>نسبة الضريبه</label>
                                <select name="tax_rate" id="tax_rate" class="form-control p-1" onchange="myFunction1()">
                                    <option value="" selected disabled>حدد نسبة الضريبة</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="12">12%</option>
                                    <option value="14">14%</option>
                                </select>
                                @error('tax_rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="col">
                                    <label>قيمة الضريبة </label>
                                    <input type="text" name="tax_value" readonly id="tax_value"
                                        class="form-control @error('value_vat') is-invalid @enderror">
                                    @error('value_vat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                         <div class="col">
                                <label>الاجمالي</label>
                                <input type="text" name="total" readonly id="total"
                                class="form-control @error('total') is-invalid @enderror">
                                @error('total')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>ملاحظات</label>
                                <textarea rows="5" class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">حفظ البيانات</button>
                                <a href="{{route('invoices.index')}}" class="btn btn-basic" role="button" aria-pressed="true">
                                    <i class="fa fa-money"></i>
                                    رجوع لقائمه الفواتير</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="section"]').on('change', function() {
                    var section_id = $(this).val();
                    if (section_id) {
                        $.ajax({
                            url: "{{ URL::to('product') }}/" + section_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="product_id"]').empty();
                                $('input[name="price"]').val('');
                                $('input[name="q"]').val('0');
                                $('select[name="product_id"]').append( '<option selected disabled>--select--</option>');

                                $.each(data, function(key, value) {
                                    $('select[name="product_id"]').append(
                                        '<option value="' + key + '">' + value +'</option>'
                                    );
                                });
                            },
                        });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="product_id"]').on('click', function() {
                var product_id = $(this).val();
                // $('[name="q"]').empty();

                        if (product_id) {
                            $.ajax({
                                url: "{{ URL::to('price') }}/" + product_id
                                , type: "GET"
                                , dataType: "json"
                                , success: function(data) {
                                    $('[name="price"]').val(data);
                                },
                            });
                        }
                        else {
                            console.log('AJAX load did not work');
                        }
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('[name="discount"]').on('keyup', function() {
                var price = document.getElementById("price").value;
                var discount = document.getElementById("discount").value;
                var net = price - discount;
                document.getElementById("net").value = net;
            });
        });
    </script> --}}
    <Script>
        function myFunction1(){
                        var total_after_discount = parseFloat(document.getElementById("total_after_discount").value);
                        var tax_rate = parseFloat(document.getElementById("tax_rate").value);
                        //  tax_value
                        var cal_tax_value = total_after_discount * tax_rate /100;
                        // total with tax
                        var final_total = parseFloat(cal_tax_value + total_after_discount);
                        document.getElementById("tax_value").value = parseFloat(cal_tax_value).toFixed(2);
                        document.getElementById("total").value = parseFloat(final_total).toFixed(2);
                    }
                    function myFunction2() {
                        var price =  parseFloat(document.getElementById("price").value);
                        var discount =  parseFloat(document.getElementById("discount").value);
                        document.getElementById("total_after_discount").value = price-discount;
                    }
                    function myFunction3() {
                        var price =  parseFloat(document.getElementById("price").value);
                        var q =  parseFloat(document.getElementById("q").value);
                            document.getElementById("price").value = q * price ;
                            console.log(price);
                    }
    </Script>
@endsection
