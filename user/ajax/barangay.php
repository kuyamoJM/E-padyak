<?php
session_start();
require_once '../../config/config.php';
$town = $_POST['town'];
$barangay = '';
if (isset($_POST['barangay'])){
	$barangay = $_POST['barangay'];
}
?>
			<select name="barangay" id="barangay" class="form-control" required="required">
				 <option disabled selected value="">- Select Barangay -</option>
				<?php
  $q = $conn->query("select * from tbl_barangay where town_id = '$town'");
  while ($r = $q->fetch_assoc()){ ?>
  ?>
  <option value="<?php echo $r['barangay_id']; ?>" <?php echo ($barangay == $r['barangay_id'] ? 'selected="selected"' : ''); ?>><?php echo $r['barangay']; ?></option>
  <?php } ?>
			</select>