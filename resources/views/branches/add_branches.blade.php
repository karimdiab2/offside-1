@extends('layouts.master')

<title>  offside - إضافة فرع جديد </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفروع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تسجيل فرع جديد</span>
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
									تسجيل فرع جديد
								</div>
								<p class="mg-b-20">قم بتسجيل بيانات فرع جديد</p>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
								<form action="{{ route('add-branches') }}" method="post" data-parsley-validate="">
                                    @csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم الفرع: <span class="tx-danger">*</span></label>
												<input class="form-control" name="branche_name" placeholder="قم بإدخال اسم الفرع" required type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">العنوان: <span class="tx-danger">*</span></label>
												<input class="form-control" name="branche_address" placeholder="قم بإدخال عنوان الفرع" required type="text">
											</div>
										</div>
									</div>
                                    <div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label"> رقم الموبايل: <span class="tx-danger">*</span></label>
												<input class="form-control" name="branche_mobile" placeholder="قم بإدخال رثم الموبايل" required type="number">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">مدير الفرع: <span class="tx-danger">*</span></label>
												<input class="form-control"  name="branche_manger" placeholder="قم بإدخال اسم مدير الفرع"  required type="text">
											</div>
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
										<div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">تسجيل فرع جديد</button></div>
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
									<h4 class="card-title mg-b-0">جدول الفروع</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض فقط لجميع الفروع ..... في حالة التعديل علي بيانات اي فرع برجاء الضغط علي <a href="">تعديل بيانات فرع</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">م</th>
												<th class="wd-15p border-bottom-0">اسم الفرع</th>
												<th class="wd-20p border-bottom-0">العنوان</th>
												<th class="wd-15p border-bottom-0">رقم الموبايل</th>
												<th class="wd-10p border-bottom-0">مدير الفرع</th>
												<th class="wd-25p border-bottom-0">المخازن</th>
												<th class="wd-25p border-bottom-0">تاريخ التسجيل</th>
												<th class="wd-25p border-bottom-0">تاريخ اخر تعديل علي بيانات الفرع</th>

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
@endsection