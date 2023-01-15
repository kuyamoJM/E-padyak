<?php
session_start();
require_once '../../../config/config.php';
	$id = $_POST['id'];
$qo = $conn->query("select o.*, u.fname, u.lname, u.mname, m.* from tbl_order o inner join tbl_user u on o.user_id = u.user_id left join tbl_mode_of_payment m on o.mode_of_payment_id = m.mode_of_payment_id where o.order_id = '$id'") or die($conn->error);
$ro = $qo->fetch_assoc();
$qm = $conn->query("select * from tbl_store where store_id in (select store_id from tbl_product where product_id in (select product_id from tbl_product_order where order_id = '$id'))") or die($conn->error);
$rm = $qm->fetch_assoc();
?>
<div class="p-3">
<table width="100%" border="1" cellpadding="4" cellspacing="4">
	<tr>
		<td colspan="4"><h4 class="text-center p-1 m-0">Order Information</h4></td>
	</tr>
	<tr>
		<td width="50%" colspan="2">Order #: <br />&nbsp; <strong><?php echo $ro['order_number']; ?></strong></td>
		<td width="50%" colspan="2">Order Date: <br />&nbsp; <strong><?php echo date("d-M-Y", strtotime($ro['date_ordered'])); ?></strong></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td colspan="2">Customer Name: <br />&nbsp; <strong><?php echo $ro['lname'].', '.$ro['fname'].' '.$ro['mname']; ?></strong></td>
		<td colspan="2">Merchant: <br />&nbsp; <strong><?php echo $rm['store_name']; ?></strong>
	</tr>
	<tr>
		<td colspan="2">Order Type: <br />&nbsp; <strong><?php echo $ro['order_type']; ?></strong></td>
		<td colspan="2">Remarks: <br />&nbsp; <strong><?php echo $ro['remarks']; ?></strong>
	</tr>
	<?php
	if ($ro['barangay_id'] != 0) { 
		$qd = $conn->query("select * from tbl_barangay b inner join tbl_town t on t.town_id = b.town_id where b.barangay_id = '".$ro['barangay_id']."'");
		$rd = $qd->fetch_assoc();
	?>
	<tr>
		<td colspan="4">Delivery Address<br />&nbsp; <strong><?php echo $rd['barangay'].', '.$rd['town']; ?>, Marinduque</strong></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2">Payment Method: <br />&nbsp; <strong><?php echo ($ro['mode_of_payment_id'] == 0 ? 'Onhand Payment' : $ro['mode_of_payment'].' ('.$ro['details'].')'); ?></strong></td>
				<td colspan="2">Order Status: <br />&nbsp; <strong><?php echo $ro['status']; ?></strong></td>

	</tr>
	<?php
	  $qp = $conn->query("select * from tbl_payment where order_id = '$id'");
	 	if ($qp->num_rows > 0){
	 		$rp = $qp->fetch_assoc();
	  ?>
	<tr>
		<td colspan="2">Reference/Transaction #: <br />&nbsp; <strong><?php echo $rp['reference_number']; ?></strong></td>
		<td colspan="2">Payment Detais: <br />&nbsp; <strong><?php echo $rp['details']; ?></strong></td>

	</tr>
	  <?php } ?>
	<tr>
		<td colspan="4"><h4 class="text-center p-1 m-0">Order Details</h4></td>
	</tr>
	<tr>
		<td>Item</td>
		<td class="text-center">Quantity</td>
		<td class="text-center">Price</td>
		<td class="text-center">Amount</td>
	</tr>
      <?php 
          $qp = $conn->query("select * from tbl_product_order po inner join tbl_product p on p.product_id = po.product_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.store_id = '".$rm['store_id']."' and po.order_id = '$id'") or die($conn->error); 
          $total = 0;
          while ($rp = $qp->fetch_assoc()) {
          $total += $rp['amount']; ?>
      <tr>
          <td>
          <?php echo $rp['product_name'].' ('.$rp['brand'].' - '.$rp['category'].')'; ?></td>
          <td class="text-center"><?php echo $rp['quantity']; ?></td>
          <td class="text-right">&#8369; <?php echo number_format($rp['price'], 2); ?></td>
          <td class="text-right">&#8369; <?php echo number_format($rp['amount'], 2); ?></td>
          
      </tr>
      <?php } ?>
      <tr>
      	<td colspan="3" class="text-right"><strong>Sub-total</strong></td>
      	<td class="text-right"><strong>&#8369 <?php echo number_format($total, 2); ?></strong></td>
      </tr>
      <tr>
      	<td colspan="3" class="text-right"><strong>Delivery Charge</strong></td>
      	<td class="text-right"><strong>&#8369 <?php echo number_format($ro['delivery_charge'], 2); ?></strong></td>
      </tr>
      <tr>
      	<td colspan="3" class="text-right"><strong>Total Amount</strong></td>
      	<td class="text-right"><strong>&#8369 <?php echo number_format($ro['total_amount'], 2); ?></strong></td>
      </tr>
  </table>
  <div class="text-center p-3 d-print-none">
	  <button class="btn btn-sm btn-primary" onclick="window.print();"><i class="fa fa-print"> Print</i></button>
  </div>
  </div>