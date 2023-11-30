<?php
include("header.php");
include("dbcontroller.php");
$db_handle = new DBController();
$query = "SELECT * FROM cat";
$result = $db_handle->runQuery($query);

?>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Product Add</h4>
				<h6>Create new product</h6>
			</div>
		</div>
		<form method="POST" action="code.php" id="myform" enctype="multipart/form-data">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" name="pname">
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Code</label>
								<input type="text" name="pcode">
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Category</label>
								<select name="category" id="category" class="select" onChange='getSubcat(this.value);'>
									<option value>select category</option>
									<?php
									foreach ($result as $cat) {
									?>
										<option value="<?php echo $cat["id"]; ?>"><?php echo $cat["category_name"];
																					//echo $cat["id"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Sub Category</label>
								<select name="subcat" id="subcat" class="select" onChange="getProduct1(this.value);">
									<option value disabled selected>select subcategory</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Brand</label>
								<select class="select" name="brand">
									<?php
									$sql="SELECT * FROM brand";
									$result1 = $db_handle->runQuery($sql);
										foreach($result1 as $brand ){
									?>
									<option value="<?=$brand['b_id']?>"><?=$brand['b_name'];?></option>
									<?php
									}
									?>
									<!--<option>Brand</option>-->
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Unit</label>
								<select class="select" name="punit">
									<option>psc</option>

								</select>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Minimum Qty</label>
								<input type="text" name="minQty">
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Quantity</label>
								<input type="text" name="Quantity">
							</div>
						</div>
						


						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="pdesc"></textarea>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label> Status</label>
								<select name="status" class="select">
									<option value="Closed">Closed</option>
									<option value="Open">Open</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Discount Type</label>
								<select class="select" name="disc">
									<option>Percentage</option>
									<option>05%</option>
									<option>10%</option>
									<option>15%</option>
									<option>20%</option>
									<option>25%</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Real Price</label>
								<input type="text" name="prealprice">
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Selling Price</label>
								<input type="text" name="pprice">
							</div>
						</div>

						<div class="col-lg-12">
							<div class="form-group">
								<label> Product Image</label>
								<div class="image-upload">
									<input type="file" name="pfile">
									<div class="image-uploads">
										<!--<img src="assets/img/icons/upload.svg" alt="img">-->
										<h4>Drag and drop a file to upload</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<input type="Submit" name="pro_add" class="btn btn-submit me-2">
							<a href="productlist.php" class="btn btn-cancel">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</form>
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
				getProduct1();
			}
		});

	}

	function getProduct1(val) {
		$.ajax({
			type: "POST",
			url: "getproduct.php",
			data: 'subcat_id = ' + val,
			success: function(data) {
				$("#product-id").html(data);

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