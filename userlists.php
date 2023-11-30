<?php

include('header.php');
include('dbcon.php');
?>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>User List</h4>
				<h6>Manage your User</h6>
			</div>
			<div class="page-btn">
				<a href="newuser.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img">Add User</a>
			</div>
		</div>
		<?php include('message.php'); ?>
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
						<ul>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="card" id="filter_inputs">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<input type="text" placeholder="Enter User Name">
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Phone">
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Email">
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
								</div>
							</div>
							<div class="col-lg-2 col-sm-6 col-12">
								<div class="form-group">
									<select class="select">
										<option>Disable</option>
										<option>Enable</option>
									</select>
								</div>
							</div>
							<div class="col-lg-1 col-sm-6 col-12 ms-auto">
								<div class="form-group">
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
										<input type="checkbox">
										<span class="checkmarks"></span>
									</label>
								</th>
								<th>image</th>
								<th>User name </th>
								<th>Phone</th>
								<th>email</th>
								<th>Role</th>
								<th>Created On</th>

								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "select * from login";
							$rs = mysqli_query($conn, $sql);
							if (mysqli_num_rows($rs) > 0) {

								foreach ($rs as $user) {

							?>
									<tr>

										<td>
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
											<?php if($user['u_role']=='user')
											{?>
										<td><a href="javascript:void(0);" class="product-img">
										<img src="assets/img/customer/<?= $user['u_img'] ?>" alt="img" id="blah"> </a></td>
											<?php }else{?>
												<td><a href="javascript:void(0);" class="product-img">
										<img src="assets/img/profiles/<?= $user['u_img'] ?>" alt="img" id="blah"> </a></td>
												<?php } ?>
										<td><?= $user['u_name'] ?></td>
										<td><?= $user['u_mobile'] ?> </td>
										<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fb8f9394969a88bb9e839a968b979ed5989496">[email&#160;protected]</a> </td>
										<td><?= $user['u_role'] ?> </td>
										<td><?= $user['u_date'] ?> </td>


										<!--<td><span class="bg-lightgreen badges">Active</span></td>-->
										<td>

										<form method="post" action="code.php">
										<button type="submit" name="del_user" value="<?=$user['u_id'];?> " class="btn btn-sm"><img src="assets/img/icons/delete.svg" alt="img"></button>
										</form>
											
									
										</td>

									</tr>
							<?php }
							} ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create Payment</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Customer</label>
							<div class="input-group">
								<input type="text" value="2022-03-07" class="datetimepicker">
								<a class="scanner-set input-group-text">
									<img src="assets/img/icons/datepicker.svg" alt="img">
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Reference</label>
							<input type="text" value="INV/SL0101">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Received Amount</label>
							<input type="text" value="1500.00">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Paying Amount</label>
							<input type="text" value="1500.00">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Payment type</label>
							<select class="select">
								<option>Cash</option>
								<option>Online</option>
								<option>Inprogress</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Note</label>
							<textarea class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-submit">Submit</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Payment</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Customer</label>
							<div class="input-group">
								<input type="text" value="2022-03-07" class="datetimepicker">
								<a class="scanner-set input-group-text">
									<img src="assets/img/icons/datepicker.svg" alt="img">
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Reference</label>
							<input type="text" value="INV/SL0101">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Received Amount</label>
							<input type="text" value="1500.00">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Paying Amount</label>
							<input type="text" value="1500.00">
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="form-group">
							<label>Payment type</label>
							<select class="select">
								<option>Cash</option>
								<option>Online</option>
								<option>Inprogress</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Note</label>
							<textarea class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-submit">Submit</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>