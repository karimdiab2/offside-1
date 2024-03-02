@extends('layouts.master')

<title>  offside - إضافة فاتروة مشتريات جديدة</title>
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">التسجيلات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تسجيل فاتروة مشتريات جديدة</span>
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
									تسجيل فاتروة مشتريات جديدة
								</div>
								<p class="mg-b-20">قم بتسجيل بيانات الفاتورة </p>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
								<form action="{{ route('add_purchase') }}" method="post" data-parsley-validate="">
                                    @csrf
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <div class="form-group mg-b-0">
                                                <label class="form-label"> رقم الفاتورة: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="purchase_invoices_no" placeholder="قم بإدخال رقم الفاتورة" required type="number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">تاريخ الفاتورة: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="purchase_invoices_date" placeholder="قم بإدخال عنوان الفرع" required type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10">اختر اسم المورد</p>
                                            <select class="form-control select2" name="purchase_invoices_supplier">
                                                <option label="Choose one"></option>
                                                <option value="1">Firefox</option>
                                                <option value="2">Chrome</option>
                                                <option value="3">Safari</option>
                                                <option value="4">Opera</option>
                                                <option value="5">Internet Explorer</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">إجمالي الفاتورة: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="purchase_invoices_amount" placeholder="قم بإدخال مبلغ الفاتورة" required type="number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label"> ملاحظات: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="purchase_invoices_note" placeholder="قم بإدخال ملاحظات علي الفاتورة" type="text">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            <button class="btn btn-primary add_row" onclick="addNewRow()" style="float: inline-end; margin-top :10px; margin-bottom :30px;">اضافة صف</button>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>كود المنتج</th>
                                                        <th>اسم المنتج</th>
                                                        <th>الكمية</th>
                                                        <th>سعر الشراء</th>
                                                        <th>الإجمالي</th>
                                                        <th>فرع / مخزن</th>
                                                        <th>مكان حفظ البضاعة البضاعة</th>
                                                        <th>مسح</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="invoice-details">
                                                    <tr>
                                                        <td><input class="form-control product_id" name="product_id[]" placeholder="كود المنتج"   type="number"></td>
                                                        <td><input class="form-control product_name" name="product_name[]" placeholder="اسم المنتج"   type="text"></td>

                                                        <td><input class="form-control quantity" name="quantity[]" placeholder="الكمية"  type="number"></td>
                                                        <td><input class="form-control price" name="price[]" placeholder="السعر"  type="number"></td>
                                                        <td><input class="form-control total" name="total[]" placeholder="الإجمالي"  type="number"></td>
                                                        <td>
                                                            <select class="form-control warehouse_branche" name="warehouse_branche[]" >
                                                                <option value="مخزن">مخزن</option>
                                                                <option value="فرع">فرع</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control save_place" name="save_place[]" >
                                                                <option value="32">مخزن 32</option>
                                                                <option value="1">فرع 1</option>
                                                                <option value="33">مخزن 33</option>
                                                                <option value="2">فرع 2</option>
                                                                <option value="34">مخزن 34</option>

                                                            </select>
                                                        </td>
                                                        <td><button class="btn btn-danger delete_row" onclick="deleteRow(this)">مسح</button></td>
                                                        </tr>


                                                </tbody>
                                                <tfooter>
                                                    <tr id="sum-row">
                                                        <td colspan="2">Total:</td>
                                                        <td class="quantity-sum">0</td>
                                                        <td class="price-sum">0</td>
                                                        <td class="total-sum">0</td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tfooter>
                                            </table>
                                        </div>
                                        <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">تسجيل الفاتورة </button></div>
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
									<h4 class="card-title mg-b-0">جدول فواتير المشتريات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">جدول عرض فقط لجميع فواتير المشتريات ..... في حالة التعديل علي بيانات اي فاتورة برجاء الضغط علي <a href="">تعديل بيانات فاتورة</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">First name</th>
												<th class="wd-15p border-bottom-0">Last name</th>
												<th class="wd-20p border-bottom-0">Position</th>
												<th class="wd-15p border-bottom-0">Start date</th>
												<th class="wd-10p border-bottom-0">Salary</th>
												<th class="wd-25p border-bottom-0">E-mail</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Bella</td>
												<td>Chloe</td>
												<td>System Developer</td>
												<td>2018/03/12</td>
												<td>$654,765</td>
												<td>b.Chloe@datatables.net</td>
											</tr>
											<tr>
												<td>Donna</td>
												<td>Bond</td>
												<td>Account Manager</td>
												<td>2012/02/21</td>
												<td>$543,654</td>
												<td>d.bond@datatables.net</td>
											</tr>
											<tr>
												<td>Harry</td>
												<td>Carr</td>
												<td>Technical Manager</td>
												<td>20011/02/87</td>
												<td>$86,000</td>
												<td>h.carr@datatables.net</td>
											</tr>
											<tr>
												<td>Lucas</td>
												<td>Dyer</td>
												<td>Javascript Developer</td>
												<td>2014/08/23</td>
												<td>$456,123</td>
												<td>l.dyer@datatables.net</td>
											</tr>
						
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Function to add a new row
function addNewRow() {

    event.preventDefault();
    const invoiceDetails = document.getElementById('invoice-details');
    const rows = invoiceDetails.querySelectorAll('tr:not(#sum-row)');
    const lastRow = rows[rows.length - 1];
    const inputs = lastRow.querySelectorAll('input, select');

    // Check if the last row is empty
    let isEmpty = true;
    inputs.forEach(input => {
        if (input.value.trim() !== '') {
            isEmpty = false;
        }
    });

    // Add new row only if the last row is not empty
    if (!isEmpty) {
        const newRow = lastRow.cloneNode(true);
        const newInputs = newRow.querySelectorAll('input, select');

        newInputs.forEach(input => input.value = '');

        invoiceDetails.appendChild(newRow);
    }
}

    // Function to delete a row
    function deleteRow(button) {
        const row = button.closest('tr');
        row.remove();
    }

    // Attach event listener to the "Add Row" button
    document.querySelector('.add_row').addEventListener('click', addNewRow);

    // Attach event listener to the "Delete Row" buttons
    const deleteButtons = document.querySelectorAll('.delete_row');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            deleteRow(this);
        });
    });

    // Calculate totals when quantity or price changes
    document.addEventListener('input', function(e) {
        const target = e.target;

        if (target.classList.contains('quantity') || target.classList.contains('price')) {
            const rows = document.querySelectorAll('#invoice-details tr:not(#sum-row)');
            let quantitySum = 0;
            let priceSum = 0;
            let totalSum = 0;

            rows.forEach(function(row) {
                const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
                const price = parseFloat(row.querySelector('.price').value) || 0;
                const total = quantity * price;

                row.querySelector('.total').value = total.toFixed(2);

                quantitySum += quantity;
                priceSum += price;
                totalSum += total;
            });

            document.querySelector('.quantity-sum').textContent = quantitySum.toFixed(2);
            document.querySelector('.price-sum').textContent = priceSum.toFixed(2);
            document.querySelector('.total-sum').textContent = totalSum.toFixed(2);
        }
    });
</script>









@endsection
