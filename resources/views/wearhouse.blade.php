@extends('layouts.master')

<title>  offside - إضافة مخزن جديد </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">التسجيلات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تسجيل مخزن جديد</span>
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
									تسجيل مخزن جديد
								</div>
								<p class="mg-b-20">قم بتسجيل بيانات مخزن جديد</p>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
								<form action="{{ route('add-Warehouses') }}" method="post" data-parsley-validate="">
                                    @csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم المخزن: <span class="tx-danger">*</span></label>
												<input class="form-control" name="warehouse_name" placeholder="قم بإدخال اسم المخزن" required type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">العنوان: <span class="tx-danger">*</span></label>
												<input class="form-control" name="warehouse_addresss" placeholder="قم بإدخال عنوان المخزن" required type="text">
											</div>
										</div>
										<div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">تسجيل مخزن جديد</button></div>
									</div>
                                  
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->


                					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول المخازن</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض فقط لجميع المخازن ..... في حالة التعديل علي بيانات اي مخزن برجاء الضغط علي <a href="">تعديل بيانات مخازن</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">م</th>
												<th class="wd-15p border-bottom-0">اسم المخزن</th>
												<th class="wd-20p border-bottom-0">عنوان المخزن</th>
												<th class="wd-15p border-bottom-0">تاريخ التسجيل </th>
												<th class="wd-10p border-bottom-0">تاريخ اخر تعديل</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($warehouses as $warehouse)

											<tr>
												<td>{{ $warehouse->id }}</td>
												<td>{{ $warehouse->warehouse_name }}</td>
												<td>{{ $warehouse->warehouse_address }}</td>
												<td>{{ $warehouse->created_at }}</td>
												<td>{{ $warehouse->updated_at }}</td>
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
@endsection