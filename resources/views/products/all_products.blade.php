@extends('layouts.master')



<title>  offside -   جميع المنتجات </title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   جميع المنتجات</span>
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
				<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول المنتجات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض  لجميع المنتجات ....  في حالة التعديل في بيانات اي منتج برجاء الضغط علي زر تعديل </p>
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
												<th class=" border-bottom-0"> وصف المنتج</th>
												<th class=" border-bottom-0"> action</th>
												<th class=" border-bottom-0"> اخر تحديث</th>
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
													<td>							
													<a href="#" data-target="#edit_products_{{ $product->product_id }}" data-toggle="modal" class="btn ripple btn-primary edit-btn" >تعديل</a>
													<!-- Large Modal -->
													<div class="modal" id="edit_products_{{ $product->product_id }}">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content modal-content-demo">
																<form action="{{ route('products.update', ['products' => $product->product_id]) }}" method="POST">
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
																						<label for="supplier_name">اسم المخزن</label>
																						<input type="text" class="form-control" name="product_name" id="product_name" value="{{ $product->product_name }}">
																					</div>
																					<div class="col-lg-6 mg-t-20 mg-lg-t-0">
																						<p class="mg-b-10"> التصنيف الرئيسي:</p>
																						<select class="form-control select2" name="main_category_id" id="main_category_id">
																							<option label="">اختر تصنيف</option>
																							@foreach ($main_categories as $key => $main_category)
																								<option value="{{ $main_category->main_category_id }}" {{ $product->main_category_id == $main_category->main_category_id ? 'selected' : '' }}>
																									{{ $main_category->main_category_name }}
																								</option>
																							@endforeach
																						</select>
																					</div>

																				</div>
																				<div class="col-lg-6 mg-t-20 mg-lg-t-0">
																					<p class="mg-b-10"> تصنيف فرعي اول:</p>
																					<select class="form-control select2" name="sub_category1" id="sub_category1">
																						<option label="">اختر التصنيف الفرعي الاول</option>
																						@foreach ($sub_categories1 as $key => $sub_category1)
																							<option value="{{ $sub_category1->sub_category_1_id }}" {{ $product->sub_category_1_id == $sub_category1->sub_category_1_id ? 'selected' : '' }}>
																								{{ $sub_category1->sub_category_name_1 }}
																							</option>
																						@endforeach
																					</select>
																				</div>
																				<div class="col-lg-6 mg-t-20 mg-lg-t-0" style="margin-top : 15px;">
																					<p class="mg-b-10"> اختر التصنيف الفرعي الثاني:</p>
																					<select class="form-control select2" name="sub_category2" id="sub_category2">
																						<option label="">اختر تصنيف</option>
																						@foreach ($sub_categories2 as $key => $sub_category2)
																							<option value="{{ $sub_category2->sub_category_2_id }}" {{ $product->sub_category_2_id == $sub_category2->sub_category_2_id ? 'selected' : '' }}>
																								{{ $sub_category2->sub_category_name_2 }}
																							</option>
																						@endforeach
																					</select>
																				</div>

																				<div class="" style="margin-top : 15px;">
																					<div class="form-group">
																						<label for="supplier_name">السعر</label>
																						<input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_name"> الكمية</label>
																						<input type="number" class="form-control" name="quantity_in_stock" id="quantity_in_stock" value="{{ $product->quantity_in_stock }}">
																					</div>
																					<div class="form-group">
																						<label for="supplier_name"> وصف المنتج </label>
																						<input type="text" class="form-control" name="product_description" id="product_description" value="{{ $product->product_description }}">
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

													<form action="{{ route('products.destroy', ['products' => $product->product_id]) }}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger" onclick="return confirm('هل تريد حذف هذا المنتج ؟؟')">حذف</button>
													</form>
												</td>
													<td>{{ $product->updated_at }}</td>
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