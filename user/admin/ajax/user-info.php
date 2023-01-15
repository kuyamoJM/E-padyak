<?php
require_once '../../../config/config.php';
$id = $_POST['id'];

$q = $conn->query("select * from tbl_user u inner join tbl_barangay b on b.barangay_id = u.barangay_id inner join tbl_town t on t.town_id = b.town_id where user_id = '$id'");
$r = $q->fetch_assoc();
?>
<div class="row pt-4" dir="rtl">
	<div class="col-md-4 col-sm-5 col-8 text-center mx-auto">
		<?php if ($r['photo'] == 'profile.png') {
		?>
		<img class="w-75" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo ($r['gender'] == 'Male' ? 'm' : 'f'); ?>-profile.svg" />
		<?php } else {
		?>
		<img class="w-75" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo $r['photo']; ?>" />
	<?php } ?>
	</div>
	<div class="col-md-8 col-sm-7 col-12 text-sm-left text-center" dir="ltr">
		<strong>Name:</strong> <?php echo $r['lname'].', '.$r['fname'].' '.$r['mname']; ?><br />
		<strong>Address:</strong> <?php echo $r['location'].', Brgy. '.$r['barangay'].', '.$r['town']; ?>, Marinduque<br />
		<strong>Gender:</strong> <?php echo $r['gender']; ?><br />
		<strong>Birthday:</strong> <?php echo date("F d, Y", strtotime($r['birthday'])); ?><br />
		<strong>Contact:</strong> <?php echo $r['contact']; ?><br />
		<strong>Email:</strong> <a href="mailto:<?php echo $r['email']; ?>"><?php echo $r['email']; ?></a><br />
	</div>
</div>
	<?php
	if ($r['user_access'] == 'Merchant') {
	$qs = $conn->query("select * from tbl_store s inner join tbl_barangay b on b.barangay_id = s.barangay_id inner join tbl_town t on t.town_id = b.town_id where s.store_id = '".$r['store_id']."'");
	$rs = $qs->fetch_assoc();
	 ?>
	  <div class="modal-header">
	 <h5 class="modal-title">Store Information</h5>
	 </div>
	<div class="row pt-4" dir="rtl">

<div class="col-md-4 col-sm-5 col-8 text-center mx-auto">
		
		<img class="w-75" src="<?php echo $base_url; ?>/assets/img/store/<?php echo $rs['photo']; ?>" />
		<br />
		<a href="../../assets/proof/<?php echo $rs['document_proof']; ?>" target="_blank">View Document Proof</a>	
	</div>
	<div class="col-md-8 col-sm-7 col-12 text-sm-left text-center" dir="ltr">
		<strong>Store Name:</strong> <?php echo $rs['store_name']; ?><br />
		<strong>Address:</strong> <?php echo $rs['location'].', Brgy. '.$rs['barangay'].', '.$rs['town']; ?>, Marinduque<br />
		<strong>Short Description:</strong> <?php echo $rs['description']; ?><br />
		<strong>DTI Registration No.:</strong> <?php echo $rs['dti_number']; ?><br />
		<strong>Terms and Condition:</strong> <br /><?php echo $rs['terms_and_conditions']; ?><br />
	</div>
</div>
	<?php } ?>

