<?php

include('header.php');


?>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Product Sub Category list</h4>
				<h6>View/Search product Category</h6>
			</div>
			<?php
			include('message.php');
			?>
			<div class="page-btn">
				<a href="subcategory.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" class="me-2" alt="img"> Add Sub Category</a>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="table-top">
					<div class="search-set">
						<div class="search-path">
							<a class="btn btn-filter" id="filter_search">
								<img src="assets/img/icons/filter.svg" alt="img">
								<span><img src="assets/img/icons/closes.svg" alt="img"></span>
							</a>
						</div>
						<div class="search-input">
							<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
						</div>
					</div>
					<div class="wordset">
						<!--<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>-->
					</div>
				</div>

				<div class="card" id="filter_inputs">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<label>Category</label>
									<select class="select">
										<option>Choose Category</option>
										<option>Computers</option>
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<label>Sub Category</label>
									<select class="select">
										<option>Choose Sub Category</option>
										<option>Fruits</option>
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<label>Category Code</label>
									<select class="select">
										<option>CT001</option>
										<option>CT002</option>
									</select>
								</div>
							</div>
							<div class="col-lg-1 col-sm-6 col-12 ms-auto">
								<div class="form-group">
									<label>&nbsp;</label>
									<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table  datanew">
						<thead>
							<tr>
								<th>
									<label class="checkboxs">
										<input type="checkbox" id="select-all">
										<span class="checkmarks"></span>
									</label>
								</th>

								<th>Category</th>
								<th>Parent category</th>
								<th>Category Code</th>
								<th>Description</th>
								<th>Created By</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php


							$sql = "SELECT * FROM sub_cat";
							$rs = mysqli_query($conn, $sql);
							if (mysqli_num_rows($rs) > 0) {

								foreach ($rs as $cat_u) {
									$sel = $cat_u['cat_id'];
									$sql1 = "SELECT category_name from cat where id=" . $sel;
									$rs1 = mysqli_query($conn, $sql1);
									if (mysqli_num_rows($rs1) > 0) {

										foreach ($rs1 as $cat_u1) {
											$subcat = $cat_u['sub_name'];


							?>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>


												<td><?= $subcat ?></td>
												<td><?= $cat_u1['category_name']; ?></td>
												<td><?= $cat_u['sccode']; ?> </td>
												<td>
													<?= $cat_u['sub_desc']; ?></td>

												<td>Admin</td>
												<td>
													
													<form action="editsubcategory.php" method="POST" class="d-inline">
														<input type="hidden" name="subidhidden" value="<?= $cat_u['sub_id'] ?>">
														<button type="submit" name="update_sc" value="<?= $cat_u['cat_id']; ?> " class="btn btn-info "><img src="assets/img/icons/edit.svg" alt="img"></button>
													</form>
												
													<form action="code.php" method="POST" class="d-inline">
														<button type="submit" name="delete_sc" value="<?= $cat_u['sub_id']; ?> " class="btn btn-info "><img src="assets/img/icons/delete.svg" alt="img"></button>
													</form>
															
																

									<?php
										}
									} else {
										echo "no problem ";
									}
								}
							} else {
								echo "something else wrong";
							}
									?>





												</td>
											</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>

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