<?php
$this->load->model('model_orders');
$this->load->model('model_products');
$this->load->model('model_company');

$order_data = $this->model_orders->getOrdersData($id);
$orders_items = $this->model_orders->getOrdersItemData($id);
$company_info = $this->model_company->getCompanyData(1);

$order_date = date('m/d/Y', $order_data['date_time']);
$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title> <?= $order_data['bill_no'] . '_order_invoice - ' . $order_date; ?> </title>

	<link rel='stylesheet' type='text/css' href="<?= base_url('assets/invoice/css/style.css'); ?>" />
	<link rel='stylesheet' type='text/css' href="<?= base_url('assets/invoice/css/print.css'); ?>" media="print" />
	<script type='text/javascript' src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

</head>

<body onload="window.print();">

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>

		<div id="identity">

			<?php if ($order_data['customer_name'] != "") : ?>
				<div id="address">
					<b>Name:</b> <?= $order_data['customer_name']; ?> <br>
					<b>Address:</b> <?= $order_data['customer_address']; ?> <br>
					<b>Phone:</b> <?= $order_data['customer_phone']; ?>
				</div>
			<?php endif; ?>

			<!-- <div id="logo">
				<img id="image" src="<?= base_url('assets/invoice/images/logo.png'); ?>" alt="logo">
			</div> -->

		</div>

		<div style="clear:both"></div>

		<div id="customer">

			<div id="customer-title"> <?= $company_info['company_name']; ?> </div>

			<table id="meta">
				<tr>
					<td class="meta-head">Invoice #</td>
					<td> <?= $order_data['bill_no']; ?> </td>
				</tr>
				<tr>

					<td class="meta-head">Date</td>
					<td> <?= $order_date; ?> </td>
				</tr>
				<tr>
					<td class="meta-head">Amount Due</td>
					<td>
						<div class="due"> <?= $company_info['currency'] . ' ' . $order_data['net_amount']; ?> </div>
					</td>
				</tr>

			</table>

		</div>

		<table id="items">

			<thead>
				<tr>
					<th>Item</th>
					<th>Description</th>
					<th>Unit Price</th>
					<th>Qty</th>
					<th>Amount</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($orders_items as $k => $v) {
					$product_data = $this->model_products->getProductData($v['product_id']);
				?>
					<tr class="item-row">
						<td class="item-name"> <?= $product_data['name']; ?> </td>
						<td class="description"> <?= $product_data['description']; ?> </td>
						<td class="cost"> <?= $v['rate']; ?> </td>
						<td class="qty"> <?= $v['qty']; ?> </td>
						<td> <?= $v['amount']; ?> </td>
					</tr>
				<?php
				}
				?>

				<tr>
					<td colspan="2" class="blank"> </td>
					<td colspan="2" class="total-line">Gross Amount:</td>
					<td class="total-value">
						<div> <?= $company_info['currency'] . ' ' . $order_data['gross_amount']; ?> </div>
					</td>
				</tr>
				<?php if ($order_data['service_charge'] > 0) : ?>
					<tr>
						<td colspan="2" class="blank"> </td>
						<td colspan="2" class="total-line">Service Charge ( <?= $order_data['service_charge_rate']; ?> %):</td>
						<td class="total-value">
							<div> <?= $company_info['currency'] . ' ' . $order_data['service_charge']; ?> </div>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($order_data['vat_charge'] > 0) : ?>
					<tr>
						<td colspan="2" class="blank"> </td>
						<td colspan="2" class="total-line">Vat Charge ( <?= $order_data['vat_charge_rate']; ?> %):</td>
						<td class="total-value">
							<div id=""> <?= $company_info['currency'] . ' ' . $order_data['vat_charge']; ?> </div>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($order_data['discount'] > 0) : ?>
					<tr>
						<td colspan="2" class="blank"> </td>
						<td colspan="2" class="total-line">Discount:</td>
						<td class="total-value">
							<div id=""> <?= $company_info['currency'] . ' ' . $order_data['discount']; ?> </div>
						</td>
					</tr>
				<?php endif; ?>
				<tr>
					<td colspan="2" class="blank"> </td>
					<td colspan="2" class="total-line">Net Amount:</td>
					<td class="total-value">
						<div id=""> <?= $company_info['currency'] . ' ' . $order_data['net_amount']; ?> </div>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="blank"> </td>
					<td colspan="2" class="total-line">Paid Status:</td>
					<td class="total-value">
						<div id=""> <?= $paid_status ?> </div>
					</td>
				</tr>

			</tbody>
		</table>

		<div id="terms">
			<h5></h5>
			<br><br>
		</div>

	</div>
	
	<script>
		window.onafterprint = window.close;
	</script>

</body>

</html>