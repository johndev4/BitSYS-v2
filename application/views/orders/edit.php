<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $page_title ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('orders') ?>">Manage Order</a></li>
						<li class="breadcrumb-item active">Edit Order</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12 col-xs-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Edit Order</h3>
					</div>
					<!-- /.card-header -->
					<form role="form" action="<?php base_url('orders/create') ?>" method="post" class="form-horizontal">
						<div class="card-body">

							<span class="text-danger"><?php echo validation_errors(); ?></span>

							<div class="form-group text-right">
								<label for="date" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
							</div>
							<div class="form-group text-right">
								<label for="time" class="col-sm-12 control-label">Time: <?php echo date('h:i a') ?></label>
							</div>

							<div class="col-md-6 col-xs-12 float float-left">

								<div class="form-group">
									<label for="customer_name" class="col-sm-6 control-label" style="text-align:left;">Customer Name</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" value="<?php echo $order_data['order']['customer_name'] ?>" autocomplete="off" />
									</div>
								</div>

								<div class="form-group">
									<label for="customer_address" class="col-sm-6 control-label" style="text-align:left;">Customer Address</label>
									<div class="col-sm-12">
										<textarea type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter Customer Address" autocomplete="off">
											<?php echo $order_data['order']['customer_address'] ?>
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="customer_phone" class="col-sm-6 control-label" style="text-align:left;">Customer Phone</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter Customer Phone" value="<?php echo $order_data['order']['customer_phone'] ?>" autocomplete="off">
									</div>
								</div>
							</div>


							<br /> <br />
							<table class="table table-bordered" id="product_info_table">
								<thead>
									<tr>
										<th style="width:60%">Product</th>
										<th style="width:10%">Qty</th>
										<th style="width:10%">Rate</th>
										<th style="width:10%">Amount</th>
										<th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
									</tr>
								</thead>

								<tbody>

									<?php if (isset($order_data['order_item'])) : ?>
										<?php $x = 1; ?>
										<?php foreach ($order_data['order_item'] as $key => $val) : ?>
											<?php //print_r($v); 
											?>
											<tr id="row_<?php echo $x; ?>">
												<td>
													<select class="form-control select_group product" data-row-id="row_<?php echo $x; ?>" id="product_<?php echo $x; ?>" name="product[]" style="width:100%;" onchange="getProductData(<?php echo $x; ?>)" required>
														<option value=""></option>
														<?php foreach ($products as $k => $v) : ?>
															<option value="<?php echo $v['id'] ?>" <?php if ($val['product_id'] == $v['id']) {
																										echo "selected='selected'";
																									} ?>><?php echo $v['name'] ?></option>
														<?php endforeach ?>
													</select>
												</td>
												<td><input type="number" name="qty[]" id="qty_<?php echo $x; ?>" class="form-control" style="width: 100px;" required oninput="getTotal(<?php echo $x; ?>)" value="<?php echo $val['qty'] ?>" autocomplete="off"></td>
												<td>
													<input type="number" name="rate[]" id="rate_<?php echo $x; ?>" class="form-control" style="width: 100px;" disabled value="<?php echo $val['rate'] ?>" autocomplete="off">
													<input type="hidden" name="rate_value[]" id="rate_value_<?php echo $x; ?>" class="form-control" value="<?php echo $val['rate'] ?>" autocomplete="off">
												</td>
												<td>
													<input type="number" name="amount[]" id="amount_<?php echo $x; ?>" class="form-control" style="width: 100px;" disabled value="<?php echo $val['amount'] ?>" autocomplete="off">
													<input type="hidden" name="amount_value[]" id="amount_value_<?php echo $x; ?>" class="form-control" value="<?php echo $val['amount'] ?>" autocomplete="off">
												</td>
												<td><button type="button" class="btn btn-default" onclick="removeRow('<?php echo $x; ?>')"><i class="fa fa-times"></i></button></td>
											</tr>
											<?php $x++; ?>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>

							<br /> <br />

							<div class="col-md-6 col-xs-12 float float-right">

								<div class="form-group">
									<label for="gross_amount" class="col-sm-6 control-label">Gross Amount</label>
									<div class="col-sm-12">
										<input type="number" class="form-control" id="gross_amount" name="gross_amount" disabled value="<?php echo $order_data['order']['gross_amount'] ?>" autocomplete="off">
										<input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" value="<?php echo $order_data['order']['gross_amount'] ?>" autocomplete="off">
									</div>
								</div>
								<?php if ($is_service_enabled == true) : ?>
									<div class="form-group">
										<label for="service_charge" class="col-sm-6 control-label">S-Charge <?php echo $company_data['service_charge_value'] ?> %</label>
										<div class="col-sm-12">
											<input type="number" class="form-control" id="service_charge" name="service_charge" disabled value="<?php echo $order_data['order']['service_charge'] ?>" autocomplete="off">
											<input type="hidden" class="form-control" id="service_charge_value" name="service_charge_value" value="<?php echo $order_data['order']['service_charge'] ?>" autocomplete="off">
										</div>
									</div>
								<?php endif; ?>
								<?php if ($is_vat_enabled == true) : ?>
									<div class="form-group">
										<label for="vat_charge" class="col-sm-6 control-label">Vat <?php echo $company_data['vat_charge_value'] ?> %</label>
										<div class="col-sm-12">
											<input type="number" class="form-control" id="vat_charge" name="vat_charge" disabled value="<?php echo $order_data['order']['vat_charge'] ?>" autocomplete="off">
											<input type="hidden" class="form-control" id="vat_charge_value" name="vat_charge_value" value="<?php echo $order_data['order']['vat_charge'] ?>" autocomplete="off">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label for="discount" class="col-sm-6 control-label">Discount</label>
									<div class="col-sm-12">
										<input type="number" class="form-control" id="discount" name="discount" placeholder="Discount" oninput="subAmount()" value="<?php echo $order_data['order']['discount'] == '0' ? '' : $order_data['order']['discount'] ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="net_amount" class="col-sm-6 control-label">Net Amount</label>
									<div class="col-sm-12">
										<input type="number" class="form-control" id="net_amount" name="net_amount" disabled value="<?php echo $order_data['order']['net_amount'] ?>" autocomplete="off">
										<input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" value="<?php echo $order_data['order']['net_amount'] ?>" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="paid_status" class="col-sm-6 control-label">Paid Status</label>
									<div class="col-sm-12">
										<select type="text" class="form-control" id="paid_status" name="paid_status">
											<option value="2">Unpaid</option>
											<option value="1">Paid</option>
										</select>
									</div>
								</div>

							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="hidden" name="service_charge_rate" value="<?php echo $company_data['service_charge_value'] ?>" autocomplete="off">
							<input type="hidden" name="vat_charge_rate" value="<?php echo $company_data['vat_charge_value'] ?>" autocomplete="off">
							<a target="__blank" href="<?php echo base_url() . 'orders/printReceipt/' . $order_data['order']['id'] ?>" class="btn btn-default">Print</a>
							<button type="submit" class="btn btn-primary">Save Changes</button>
							<a href="<?php echo base_url('orders/') ?>" class="btn btn-warning">Back</a>
						</div>

					</form>
				</div>
				<!-- /.card -->

			</div>
			<!-- col-md-12 -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";

	$(document).ready(function() {
		$(".select_group").select2();
		// $("#description").wysihtml5();

		$("#mainOrdersNav > a").addClass('active');
		$("#mainOrdersNav").addClass('menu-open');
		$("#manageOrdersNav > a").addClass('active');

		$("#customer_address").wysihtml5({
			toolbar: {
				"font-styles": false,
				"emphasis": false,
				"lists": false,
				"html": false,
				"link": false,
				"image": false,
				"color": false,
				"blockquote": false
			}
		});

		// Add new row in the table 
		$("#add_row").unbind('click').bind('click', function() {
			var table = $("#product_info_table");
			var count_table_tbody_tr = $("#product_info_table tbody tr").length;
			var row_id = count_table_tbody_tr + 1;

			$.ajax({
				url: base_url + '/orders/getTableProductRow/',
				type: 'post',
				dataType: 'json',
				success: function(response) {


					// console.log(reponse.x);
					var html = '<tr id="row_' + row_id + '">' +
						'<td>' +
						'<select class="form-control select_group product" data-row-id="' + row_id + '" id="product_' + row_id + '" name="product[]" style="width:100%;" onchange="getProductData(' + row_id + ')">' +
						'<option value=""></option>';
					$.each(response, function(index, value) {
						html += '<option value="' + value.id + '">' + value.name + '</option>';
					});

					html += '</select>' +
						'</td>' +
						'<td><input type="number" name="qty[]" id="qty_' + row_id + '" class="form-control" oninput="getTotal(' + row_id + ')"></td>' +
						'<td><input type="text" name="rate[]" id="rate_' + row_id + '" class="form-control" disabled><input type="hidden" name="rate_value[]" id="rate_value_' + row_id + '" class="form-control"></td>' +
						'<td><input type="text" name="amount[]" id="amount_' + row_id + '" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_' + row_id + '" class="form-control"></td>' +
						'<td><button type="button" class="btn btn-default" onclick="removeRow(\'' + row_id + '\')"><i class="fa fa-times"></i></button></td>' +
						'</tr>';

					if (count_table_tbody_tr >= 1) {
						$("#product_info_table tbody tr:last").after(html);
					} else {
						$("#product_info_table tbody").html(html);
					}

					$(".product").select2();

				}
			});

			return false;
		});

		<?php $paid_status = $this->db->get_where('orders', array('id' => basename($_SERVER['PHP_SELF'])))->row_array()['paid_status']; ?>
		$("#paid_status").val("<?php echo $paid_status; ?>");

	}); // /document

	function getTotal(row = null) {
		if (row) {
			var total = Number($("#rate_value_" + row).val()) * Number($("#qty_" + row).val());
			total = total.toFixed(2);
			$("#amount_" + row).val(total);
			$("#amount_value_" + row).val(total);

			subAmount();

		} else {
			alert('no row !! please refresh the page');
		}
	}

	// get the product information from the server
	function getProductData(row_id) {
		var product_id = $("#product_" + row_id).val();
		if (product_id == "") {
			$("#rate_" + row_id).val("");
			$("#rate_value_" + row_id).val("");

			$("#qty_" + row_id).val("");

			$("#amount_" + row_id).val("");
			$("#amount_value_" + row_id).val("");

		} else {
			$.ajax({
				url: base_url + 'orders/getProductValueById',
				type: 'post',
				data: {
					product_id: product_id
				},
				dataType: 'json',
				success: function(response) {
					// setting the rate value into the rate input field

					$("#rate_" + row_id).val(response.price);
					$("#rate_value_" + row_id).val(response.price);

					$("#qty_" + row_id).val(1);
					$("#qty_value_" + row_id).val(1);

					var total = Number(response.price) * 1;
					total = total.toFixed(2);
					$("#amount_" + row_id).val(total);
					$("#amount_value_" + row_id).val(total);

					subAmount();
				} // /success
			}); // /ajax function to fetch the product data 
		}
	}

	// calculate the total amount of the order
	function subAmount() {
		var service_charge = <?php echo ($company_data['service_charge_value'] > 0) ? $company_data['service_charge_value'] : 0; ?>;
		var vat_charge = <?php echo ($company_data['vat_charge_value'] > 0) ? $company_data['vat_charge_value'] : 0; ?>;

		var tableProductLength = $("#product_info_table tbody tr").length;
		var totalSubAmount = 0;
		for (x = 0; x < tableProductLength; x++) {
			var tr = $("#product_info_table tbody tr")[x];
			var count = $(tr).attr('id');
			count = count.substring(4);

			totalSubAmount = Number(totalSubAmount) + Number($("#amount_" + count).val());
		} // /for

		totalSubAmount = totalSubAmount.toFixed(2);

		// sub total
		$("#gross_amount").val(totalSubAmount);
		$("#gross_amount_value").val(totalSubAmount);

		// vat
		var vat = (Number($("#gross_amount").val()) / 100) * vat_charge;
		vat = vat.toFixed(2);
		$("#vat_charge").val(vat);
		$("#vat_charge_value").val(vat);

		// service
		var service = (Number($("#gross_amount").val()) / 100) * service_charge;
		service = service.toFixed(2);
		$("#service_charge").val(service);
		$("#service_charge_value").val(service);

		// total amount
		var totalAmount = (Number(totalSubAmount) + Number(vat) + Number(service));
		totalAmount = totalAmount.toFixed(2);
		// $("#net_amount").val(totalAmount);
		// $("#totalAmountValue").val(totalAmount);

		var discount = $("#discount").val();
		if (discount) {
			var grandTotal = Number(totalAmount) - Number(discount);
			grandTotal = grandTotal.toFixed(2);
			$("#net_amount").val(grandTotal);
			$("#net_amount_value").val(grandTotal);
		} else {
			$("#net_amount").val(totalAmount);
			$("#net_amount_value").val(totalAmount);

		} // /else discount 

		var paid_amount = Number($("#paid_amount").val());
		if (paid_amount) {
			var net_amount_value = Number($("#net_amount_value").val());
			var remaning = net_amount_value - paid_amount;
			$("#remaining").val(remaning.toFixed(2));
			$("#remaining_value").val(remaning.toFixed(2));
		}

	} // /sub total amount

	function paidAmount() {
		var grandTotal = $("#net_amount_value").val();

		if (grandTotal) {
			var dueAmount = Number($("#net_amount_value").val()) - Number($("#paid_amount").val());
			dueAmount = dueAmount.toFixed(2);
			$("#remaining").val(dueAmount);
			$("#remaining_value").val(dueAmount);
		} // /if
	} // /paid amoutn function

	function removeRow(tr_id) {
		$("#product_info_table tbody tr#row_" + tr_id).remove();
		subAmount();
	}
</script>