@extends('layouts.master')



<title>  offside - إضافة منتج جديد </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تسجيل منتج جديد</span>
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


				<!-- row -->
				<div class="row">


					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								

								<div class="row">
									<div class="col-4">
										<div class="main-content-label mg-b-5">
												تسجيل منتج جديد
											</div>
											<p class="mg-b-20">قم بتسجيل بيانات منتج جديد</p>
										</div>
									<div class="col-4"></div>
									<div class="col-4" style="text-align: end;">										
										<a class="btn ripple btn-teal" data-target="#select2modal" data-toggle="modal" href="">View Demo</a>												
									</div>
								</div>
								


								<form action="{{ route('add-products') }}" method="post" data-parsley-validate="">
                                    @csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم المنتج: <span class="tx-danger">*</span></label>
												<input class="form-control" name="product_name" placeholder="قم بإدخال اسم المنتج" required="" type="text">
											</div>
										</div>
										<div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10"> التصنيف الرئيسي:</p>

											<select class="form-control select2" name="main_category_id" id="main_category_id">
                                                <option label="">اختر تصنيف</option>
												@foreach ($main_categories as $key => $main_category_id)

                                                <option value="{{ $main_category_id->main_category_id }}">{{ $main_category_id->main_category_name }}</option>
												@endforeach

                                                
                                            </select>
                                        </div>
									</div>
                                    <div class="row row-sm" style="margin-top : 15px;">
										<div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10"> تصنيف فرعي اول:</p>
                                            <select class="form-control select2" name="sub_category1" id="sub_category1">
                                                <option label="">اختر التصنيف الفرعي الاول</option>
												@foreach ($sub_categories1 as $key => $sub_category1)
												
                                                <option value="{{ $sub_category1->sub_category_1_id }}">{{ $sub_category1->sub_category_name_1 }}</option>
												@endforeach

                                                
                                            </select>
                                        </div>
										<div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10"> اختر التصنيف الفرعي الثاني:</p>
                                            <select class="form-control select2" name="sub_category2" id="sub_category2">
                                                <option label="">اختر تصنيف</option>
												@foreach ($sub_categories2 as $key => $sub_category2)
                                                <option value="{{ $sub_category2->sub_category_2_id }}">{{ $sub_category2->sub_category_name_2 }}</option>
												@endforeach

                                                
                                            </select>
                                        </div>
									</div>

									<div class="row row-sm" style="margin-top : 20px;">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label"> سعر الشراء: <span class="tx-danger">*</span></label>
												<input class="form-control" name="product_price" placeholder="قم بإدخال سعر شراء المنتج" required="" type="number">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label"> كمية المنتج المتاحة: <span class="tx-danger">*</span></label>
												<input class="form-control" name="quantity_in_stock" placeholder="قم بإدخال كمية المنتج المتاحة" required="" type="number">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">وصف المنتج: <span class="tx-danger">*</span></label>
												<input class="form-control" name="product_description" placeholder="قم بإدخال وصف المنتج" required="" type="text">
											</div>
										</div>
									</div>
									<div class="col-12" style="margin-top: 15px;"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">تسجيل منتج جديد</button></div>

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
									<h4 class="card-title mg-b-0">جدول المنتجات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض  لجميع المنتجات ....  في حالة التعديل في بيانات اي منتج برجاء الذهاب الي صفحة المنتجات </p>
							</div>

							<div class=" row" style="padding: 20px;">
								<div class="form-group mg-b-0 col-4">
									<label class="form-label"> عدد المنتجات: </label>
									<input class="form-control" name="count_products" value="{{ $rowCount }}" required="" type="text" readonly style="text-align: center;">
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
												<th class=" border-bottom-0">اسم المنتج</th>
												<th class=" border-bottom-0">التصنيف الرئيسي</th>
												<th class=" border-bottom-0"> التصنيف الفرعي الاول</th>
												<th class=" border-bottom-0">التصنيف الفرعي الثاني</th>
												<th class=" border-bottom-0">سعر الشراء</th>
												<th class=" border-bottom-0"> الكمية</th>
												<th class=" border-bottom-0"> الملاحظات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products as $key => $product)
												<tr>
													<td>{{ $key + 1 }}</td>
													<td>{{ $product->product_name }}</td>
													<td>{{ $product->main_category_name }}</td>
													<td>{{ $product->sub_category_name_1 }}</td>
													<td>{{ $product->sub_category_name_2 }}</td>
													<td>{{ $product->price }}</td>
													<td>{{ $product->quantity_in_stock }}</td>
													<td>{{ $product->product_description }}</td>
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


				<!-- Basic modal -->
				<div class="modal" id="select2modal">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<form action="{{ route('add_main_category') }}" method="post">
								<div class="modal-header">
									<h6 class="modal-title">تسجيل تصنيف رئيسي جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label"> اسم التصنيف الرئيسي: <span class="tx-danger">*</span></label>
												<input class="form-control" name="main_category_name" placeholder="قم بإدخال اسم التصنيف" required="" type="text">
												</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">وصف التصنيف: <span class="tx-danger">*</span></label>
												<input class="form-control" name="main_category_name_description" placeholder="قم بإدخال وصف التصنيف" required="" type="text">
											</div>
										</div>
									
								</div>
								<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit">اضافة التصنيف</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Basic modal -->
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