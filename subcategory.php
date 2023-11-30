<?php

include('header.php');

?>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Product Add sub Category</h4>
				<h6>Create new product Category</h6>
			</div>
		</div>


		<form method="POST" action="code.php">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">

								<label>Parent Category</label>
								<select class="select" name="select">
									<?php
									$sql = "SELECT * FROM cat";
									$rs = mysqli_query($conn, $sql);
									if (mysqli_num_rows($rs) > 0) {
										foreach ($rs as $cat_u) {
									?>

											<option value="<?= $cat_u['id'] ?>"><?= $cat_u['category_name'] ?></option>

									<?php
										}
									} else {
										echo "something else wrong";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="scname">
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="form-group">
								<label>Category Code</label>
								<input type="text" name="sccode">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="scdesc"></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<button class="btn btn-primary" type="submit" name="sub_cat">Submit</button>
							<a class=" btn btn-info me-3" href="subcategorylist.php">
								Back
							</a>

						</div>
					</div>
				</div>
		</form>
	</div>
</div>
</div>


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