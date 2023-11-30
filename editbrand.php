<?php

include('header.php');


?>

<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Brand Edit</h4>
        <h6>Update your Brand</h6>
      </div>
    </div>
    <form method="post" action="code.php" enctype="multipart/form-data">
      <?php
      $e_brand = mysqli_real_escape_string($conn, $_POST['update_b']);
      $sql = "SELECT * FROM brand WHERE b_id=" . $e_brand;
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        foreach ($result as $brand) {

      ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="bname" value="<?= $brand['b_name'] ?>">
                    <input type="hidden" name="bid" value="<?= $brand['b_id'] ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <!--<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="bdesc"><?php //echo $brand['b_desc'];
                                            ?></textarea>

</div>-->
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label> Product Image</label>
                    <div class="image-upload">
                      <input type="file" name="bfile" value=<?= $brand['b_img'] ?>>
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
                            <img src="assets/img/brand/<?= $brand['b_img'] ?>" alt="img">
                          </div>
                          <div class="productviewscontent">
                            <div class="productviewsname">
                              <h2><?= $brand['b_name'] ?></h2>
                              <h3>581kb</h3>
                            </div>
                            <a href="javascript:void(0);">x</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-12">
                  <input type="submit" name="update_bc" class="btn btn-submit me-2">
                  <a href="brandlist.php" class="btn btn-cancel">Cancel</a>
                </div>
              </div>
            </div>

          </div>
    </form>
<?php
        }
      } else {
        echo " something is wrong";
      }
?>
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