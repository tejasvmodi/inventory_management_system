<?php

include('header.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
$query = "SELECT * FROM cat";
$result = $db_handle->runQuery($query);
$cat_id = mysqli_real_escape_string( $conn,$_POST['update_sc']);
$subcat_id = mysqli_real_escape_string( $conn,$_POST['subidhidden']);
?>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Product Edit Sub Category</h4>
				<h6>Create new product Category</h6>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="row">
					<form method="POST" action="code.php">
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">
								
								<label>Parent Category</label>
								<select name="category" id="category" class="select" onChange='getSubcat(this.value);'>
									
									<?php
									foreach ($result as $cat) {
									   if($cat['id']==$cat_id){
									
									 
									?>
									<option value="<?php echo $cat["id"];?>" selected><?php echo $cat["category_name"];?></option>;
									
									   <?php
															  }else{
									   ?>
										<option value="<?php echo $cat["id"]; ?>"><?php echo $cat["category_name"];
																					 ?></option>
									<?php
									}
								}
									?>
								</select>
							</div>
						</div>
                           <?php
						       $query = "SELECT * FROM sub_cat WHERE sub_id =".$subcat_id;
							   $result = $db_handle->runQuery($query);
							   foreach ($result as $cat1) {

						   ?>
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">
								<label>SubCategory Name</label>
								<input type="text" name="subcat_name" value="<?= $cat1['sub_name']?>">
								<input type="hidden" name="subcat_id" value="<?=$subcat_id?>">
							</div>
						</div>
						
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">
								<label>Category Code</label>

								<input type="text" id="subcat_code" name="subcat_code" value="<?= $cat1['sccode']?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" id="subcat_desc" name="subcat_desc" ><?= $cat1['sub_desc']?></textarea>
							
							</div>
							
						</div>
						<div class="col-lg-12">
							<input type="hidden" name="update_sub_cat" value="<?=$subcat_id ?>">
						<input type="submit" name="update_sub_cat1" class="btn btn-submit me-2" >
						  <a href="subcategorylist.php" class="btn btn-cancel">Cancel</a>
						  <?php
							   }
							?>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
</div>

<script type="text/javascript">
	function getSubcat(val) {
		//(val);   
		$.ajax({
			type: "POST",
			url: "getsubcat.php",
			data: {
				category_id: val
			},
			success: function(data) {
				$("#subcat").html(data);
				getcode();
			}
		});

	}
</script>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>