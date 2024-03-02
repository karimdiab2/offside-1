@extends('layouts.master')



<title>  offside -   جميع الموردين </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الموردين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   جميع الموردين</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

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
                					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول الموردين</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض  لجميع الموردين ....  في حالة التعديل في بيانات اي مورد الضغظ علي زر التعديل بالجدول </p>
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
												<th class=" border-bottom-0"> action</th>
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
												<td>							
													<a href="#" data-target="#edit_suppliers_{{ $supplier->supplier_id }}" data-toggle="modal" class="btn ripple btn-primary edit-btn" >تعديل</a>
													<!-- Large Modal -->
													<div class="modal" id="edit_suppliers_{{ $supplier->supplier_id }}">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content modal-content-demo">
																<form action="{{ route('suppliers.update', ['supplier' => $supplier->supplier_id]) }}" method="POST">
																	@csrf
																	@method('PUT')

																	<div class="modal-header">
																		<h6 class="modal-title">تعديل بيانات المورد</h6>
																		<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
																	<div class="modal-body">
																		<div class="card box-shadow-0" style="padding-top: 10px;">
																			<div class="card-body pt-0">
																				<div class="">
																					<div class="form-group">
																						<label for="supplier_name">اسم المورد</label>
																						<input type="text" class="form-control" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_num">الموبايل</label>
																						<input type="text" class="form-control" name="supplier_num" id="supplier_num" value="{{ $supplier->supplier_phone_number }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_address">العنوان</label>
																						<input type="text" class="form-control" name="supplier_address" id="supplier_address" value="{{ $supplier->supplier_address }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_email">الايميل</label>
																						<input type="email" class="form-control" name="supplier_email" id="supplier_email" value="{{ $supplier->supplier_email }}">
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button class="btn ripple btn-primary" type="submit">حفظ التعديلات</button>
																		<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<!-- End Large Modal -->

													<form action="{{ route('suppliers.destroy', ['supplier' => $supplier->supplier_id]) }}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">حذف</button>
													</form>
												</td>												
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
        $('.edit-btn').click(function() {
            var supplierId = $(this).data('id');
            $('#edit_suppliers_' + supplierId).modal('show');
        });
    });
</script>

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