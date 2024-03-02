@extends('layouts.master')



<title>  offside - جميع الفروع </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفروع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   جميع الفروع</span>
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
									<h4 class="card-title mg-b-0">جدول الفروع</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض  لجميع الفروع ....  في حالة التعديل في بيانات اي فرع الضغظ علي زر التعديل بالجدول </p>
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
												<th class="wborder-bottom-0">اسم الفرع</th>
												<th class=" border-bottom-0">العنوان</th>
												<th class=" border-bottom-0">رقم الموبايل</th>
												<th class=" border-bottom-0">المدير المسئول</th>
												<th class=" border-bottom-0">المخاون التابع لها </th>
												<th class=" border-bottom-0">تاريخ التسجيل</th>
												<th class=" border-bottom-0"> action</th>
												<th class=" border-bottom-0">تاريخ اخر تعديل علي بيانات الفرع</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($branches as $key => $branche)
											<tr>
												<td>{{ $key + 1 }}</td>
												<td>{{ $branche->branch_name }}</td>
												<td>{{ $branche->branch_address }}</td>
												<td>{{ $branche->branch_phone }}</td>
												<td>{{ $branche->branch_manger }}</td>
												<td>
														@foreach ($warehouses2 as $warehouse)
															@if ($warehouse->branch_id == $branche->branch_id)
																{{ $warehouse->warehouse_name }}
																@if (!$loop->last)
																	/
																@endif
															@endif
														@endforeach
												</td>
												<td>{{ $branche->created_at }}</td>
												<td>							
													<a href="#" data-target="#edit_branche_{{ $branche->branch_id  }}" data-toggle="modal" class="btn ripple btn-primary edit-btn" >تعديل</a>
													<!-- Large Modal -->
													<div class="modal" id="edit_branche_{{ $branche->branch_id }}">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content modal-content-demo">
																<form action="{{ route('branches.update', ['branches' => $branche->branch_id]) }}" method="POST">
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
																						<label for="supplier_name">اسم الفرع</label>
																						<input type="text" class="form-control" name="branche_name" id="branche_name" value="{{ $branche->branch_name }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_num">عنوان الفرع</label>
																						<input type="text" class="form-control" name="branche_address" id="branche_address" value="{{ $branche->branch_address }}" required>
																					</div>

																					<div class="form-group">
																						<label for="supplier_address">موبايل</label>
																						<input type="text" class="form-control" name="branche_mobile" id="branche_mobile" value="{{ $branche->branch_phone }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_email">مدير الفرع</label>
																						<input type="text" class="form-control" name="branche_manger" id="branche_manger" value="{{ $branche->branch_manger }}">
																					</div>
																					<div class="card-body">
																						<div class="main-content-label mg-b-5">
																							اختيار المخزن
																						</div>
																						<p class="mg-b-20">قم بإختيار المخزن التابع لة الفرع</p>
																						<div class="">
																							@foreach ($warehouses as $key => $warehouse)
																							<div class="col-lg-3" style="margin-bottom: 10px;">
																								<label class="ckbox">
																									<input type="checkbox" name="warehouse_branches[]" value="{{ $warehouse->warehouse_id }}">
																									<span>{{ $warehouse->warehouse_name }}</span>
																								</label>
																							</div>
																							@endforeach
																						</div>
																						
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

													<form action="{{ route('branches.destroy', ['branches' => $branche->branch_id]) }}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">حذف</button>
													</form>
												</td>												
												<td>{{ $branche->updated_at }}</td>
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