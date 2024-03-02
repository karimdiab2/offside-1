@extends('layouts.master')



<title>  offside - إضافة مورد جديد </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الموردين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تسجيل مورد جديد</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">


					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تسجيل مورد جديد
								</div>
								<p class="mg-b-20">قم بتسجيل بيانات مورد جديد</p>

								@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
								<form action="{{ route('add-supplier') }}" method="post" data-parsley-validate="">
                                    @csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم المورد: <span class="tx-danger">*</span></label>
												<input class="form-control" name="supplier_name" placeholder="قم بإدخال اسم المورد" required="" type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">الموبايل: <span class="tx-danger">*</span></label>
												<input class="form-control" name="supplier_num" placeholder="قم بإدخال رقم الموبايل" required="" type="number">
											</div>
										</div>
									</div>
                                    <div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label"> العنوان: <span class="tx-danger">*</span></label>
												<input class="form-control" name="supplier_address" placeholder="قم بإدخال عنوان المورد" required="" type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">البريد الإلكتروني: <span class="tx-danger">*</span></label>
												<input class="form-control"  name="supplier_email" placeholder="قم بإدخال البريد الالكتروني"  type="email">
											</div>
										</div>
										<div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">تسجيل مورد جديد</button></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول الموردين</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض  لجميع الموردين ....  في حالة التعديل في بيانات اي مورد برجاء الذهاب الي صفحة الموردين </p>
							</div>

							<div class=" row" style="padding: 20px;">
								<div class="form-group mg-b-0 col-4">
									<label class="form-label"> عدد الموردين: </label>
									<input class="form-control" name="count_suppliers" value="{{ $rowCount }}" required="" type="text" readonly style="text-align: center;">
								</div>
								<div class="d-flex justify-content-between col-4">
									
								</div>
								<div class="d-flex justify-content-between col-4">
									
								</div>
							</div>


							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class=" border-bottom-0">م</th>
												<th class="wborder-bottom-0">اسم المورد</th>
												<th class=" border-bottom-0">العنوان</th>
												<th class=" border-bottom-0">رقم الموبايل</th>
												<th class=" border-bottom-0">الايميل</th>
												<th class=" border-bottom-0">تاريخ التسجيل</th>
												<th class=" border-bottom-0">تاريخ اخر تعديل علي بيانات المورد</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($suppliers as $key => $supplier)
											<tr>
												<td>{{ $key + 1 }}</td>
												<td>{{ $supplier->supplier_name }}</td>
												<td>{{ $supplier->supplier_phone_number }}</td>
												<td>{{ $supplier->supplier_address }}</td>
												<td>{{ $supplier->supplier_email }}</td>
												<td>{{ $supplier->created_at }}</td>												
												<td>{{ $supplier->updated_at }}</td>
											</tr>
											@endforeach

											
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->





	
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            // Remove existing alert messages
            $('.alert').remove();

            var isValid = true;

            // Validate supplier_name
            var supplierName = $('input[name="supplier_name"]').val();
            if (!supplierName.trim()) {
                isValid = false;
                $('input[name="supplier_name"]').closest('.form-group').append('<div class="alert alert-danger">اسم المورد مطلوب</div>');
                $('.alert').slideDown();
            }

            // Validate supplier_num
            var supplierNum = $('input[name="supplier_num"]').val();
            if (!supplierNum.match(/^01[0-9]{9}$/) || isNaN(supplierNum)) {
                isValid = false;
                $('input[name="supplier_num"]').closest('.form-group').append('<div class="alert alert-danger">رقم الموبايل غير صحيح</div>');
                $('.alert').slideDown();
            }

            // Validate supplier_address
            var supplierAddress = $('input[name="supplier_address"]').val();
            if (!supplierAddress.trim()) {
                isValid = false;
                $('input[name="supplier_address"]').closest('.form-group').append('<div class="alert alert-danger">العنوان مطلوب</div>');
                $('.alert').slideDown();
            }

            // Validate supplier_email
            var supplierEmail = $('input[name="supplier_email"]').val();
            if (!supplierEmail.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
                isValid = false;
                $('input[name="supplier_email"]').closest('.form-group').append('<div class="alert alert-danger">البريد الإلكتروني غير صحيح</div>');
                $('.alert').slideDown();
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            } else {
                $('.alert').slideUp();
            }
        });
    });
</script>



@endsection