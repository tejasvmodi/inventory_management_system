<?php

include('header.php');

?>
<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Product Edit Category</h4>
				<h6>Edit a product Category</h6>
			</div>
		</div>
		<?php
		$cat_id = mysqli_real_escape_string($conn, $_POST['update_c']);

		$sql = "SELECT * FROM cat where id ='$cat_id'";
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs) > 0) {
			foreach ($rs as $cat_u) {

		?>
				<form action="code.php" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="form-group">
										<label>Category Name</label>
										<input type="text" name="cname" value="<?= $cat_u['category_name']; ?>">
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="form-group">
										<label>Category Code</label>
										<input type="text" name="mcode" value="<?= $cat_u['category_code']; ?>">
									</div>
								</div>
								<div class="col-lg-12">
									<!--<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="desc" value=""><? //$cat_u['cat_description']; ?></textarea>
									</div>-->
									<input type="hidden" name="u_id" value="<?= $cat_u['id']; ?> ">
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label> Product Image</label>
										<div class="image-upload">
											<input type="file" name="filex" value="<?= $cat_u['image']; ?>">
											<div class="image-uploads">
												<img src="assets/img/icons/upload.svg" alt="img">
												<h4>Drag and drop a file to upload</h4>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="product-list">
										<ul class="row">
											<li class="ps-0">
												<div class="productviews">
													<div class="productviewsimg">
														<img src="assets/img/category/<?= $cat_u['image']; ?>" alt="img">
													</div>
													<div class="productviewscontent">
														<div class="productviewsname">
															<h2><?= $cat_u['image']; ?></h2>
															<h3>581kb</h3>
														</div>
														<a href="javascript:void(0);" class="hideset">x</a>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12">
									<input type="submit"  name="update_cat" class="btn btn-submit me-2">
									<a href="categorylist.php" class="btn btn-cancel">Cancel</a>
								</div>
							</div>
						</div>
					</div>

	</div>
<?php
			}
		} else {
			echo "no data found";
		}

?>
</form>
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