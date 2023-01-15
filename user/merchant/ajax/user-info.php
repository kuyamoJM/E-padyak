<?php
session_start();
require_once '../../../config/config.php';
	$id = $_POST['id'];
	$qu = $conn->query("select * from tbl_user u inner join tbl_barangay b on b.barangay_id = u.barangay_id inner join tbl_town t on t.town_id = b.town_id where user_id = '$id'");
	$ru = $qu->fetch_assoc();
	extract($ru);
?>
<style type="text/css">
	.img-thumb{
		width: 150px;
	}
</style>
<div class="p-3">
<table width="100%" border="0" cellpadding="4" cellspacing="4">
	<tr>
		<td colspan="4"><h4 class="text-center p-1 m-0">Customer Information</h4></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>Customer Name: <br />&nbsp; <strong><?php echo $ru['lname'].', '.$ru['fname'].' '.$ru['mname']; ?></strong></td>
		<td valign="top" rowspan="4" width="150">
			<?php 
			if ($photo == 'profile.png') {
          ?>
          <img  class="img-thumb" alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo ($gender == 'Male' ? 'm' : 'f'); ?>-profile.svg" />
          <?php } else {
          ?>
          <img  class="img-thumb" alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo $photo; ?>" />
        <?php } ?>

		</td>
	</tr>
	<tr>
		<td>Address: <br />&nbsp; <strong><?php echo $ru['location'].', '.$ru['barangay'].', '.$ru['town']; ?>, Marinduque</strong></td>
	</tr>
	<tr>
		<td>Gender: <br />&nbsp; <strong><?php echo $gender; ?></strong></td>
	</tr>
	<tr>
		<td>Birthday: <br />&nbsp; <strong><?php echo date("F d, Y", strtotime($birthday)); ?></strong></td>
	</tr>
	<tr>
		<td>Contac: <br />&nbsp; <strong><?php echo $contact; ?></strong></td>
	</tr>
	<tr>
		<td>Email: <br />&nbsp; <strong><?php echo $email; ?></strong></td>
	</tr>
	</table>
  </div>