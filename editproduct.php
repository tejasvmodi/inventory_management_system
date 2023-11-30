<?php

include('header.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
$p_id = mysqli_real_escape_string($conn, $_POST['update_p']);

$sql = "SELECT * FROM product WHERE p_id=" . $p_id;
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    foreach ($query as $p1) {

        $cat_id = $p1['cat_id'];
        $subcat_id=$p1['subcat_id'];
        $b_id=$p1['b_id'];
        $query = "SELECT * FROM cat";
      $result = $db_handle->runQuery($query);
?>
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product Edit</h4>
                        <h6>Update your product</h6>
                    </div>
                </div>
<!-- #region -->    
 <form method="POST" action="code.php" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="pname" value="<?= $p1['p_name']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Code</label>
								<input type="text" name="pcode" value="<?=$p1['p_code'];?>">
							</div>
						</div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                            
                                   <select name="category" id="category" class="select">
									
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
                            

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select name="subcat" id="subcat" class="select" >
                                    <?php
						       $query = "SELECT * FROM sub_cat WHERE cat_id=".$cat_id;
							   $result = $db_handle->runQuery($query);
							   foreach ($result as $cat1) {

									   if($cat1['sub_id']==$subcat_id){
									
									 
									?>
									<option value="<?php echo $cat1["sub_id"];?>" selected><?php echo $cat1["sub_name"];?></option>
									
									   <?php
															  }else{
									   ?>
										<option value="<?php echo $cat1["sub_id"]; ?>"><?php echo $cat1["sub_name"];
																					 ?></option>
									<?php
									}
								}
									?>
                                    </select>
                                </div>
                            </div>




                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" id="brand" class="select" >
                                    <?php
						       $query = "SELECT * FROM brand ";
							   $result = $db_handle->runQuery($query);
							   foreach ($result as $cat1) {

									   if($cat1['b_id']==$b_id){
									
									 
									?>
									<option value="<?php echo $cat1["b_id"];?>" selected><?php echo $cat1["b_name"];?></option>
									
									   <?php
															  }else{
									   ?>
										<option value="<?php echo $cat1["b_id"]; ?>"><?php echo $cat1["b_name"];
																					 ?></option>
									<?php
									}
								}
									?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="select" name="punit">
                                        <option>Piece</option>
                                        <option>Kg</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Minimum Qty</label>
                                    <input type="text" name='minQty' value="<?= $p1['minimum_qty'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="Quantity" value="<?= $p1['quantity'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="pdesc"><?= $p1['p_desc'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Discount Type</label>
                                    <select class="select" name="disc">
                                        <option>Percentage</option>
                                        <option value="<?=$p1['discount']?>"selected><?= $p1['discount']?>%</option>
									<option value="05" >05%</option>
									<option value="10">10%</option>
									<option value="15">15%</option>
									<option value="20">20%</option>
									<option value="25">25%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" name="prealprice" value="<?= $p1['r_price'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" name="pprice" value="<?= $p1['p_price'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> Status</label>
                                    <select class="select" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Open">Open</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload">
                                        <input type="file" name="filex" >
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
                                        <li>
                                            <div class="productviews">
                                                <div class="productviewsimg">
                                                    <img src="assets/img/product/<?= $p1['p_image'];?>" alt="img">
                                                </div>
                                                <div class="productviewscontent">
                                                    <div class="productviewsname">
                                                        <h2><?= $p1['p_image'];?></h2>
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
                                <input type="hidden" name="p_id" value="<?=$p_id?>">
                               <input type="submit" name="update_product" class="btn btn-submit me-2">
                                <a href="productlist.php" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
<?php
    }
}
?>
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