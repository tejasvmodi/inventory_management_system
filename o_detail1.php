<?php

include('header1.php');

?>
<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Product Details</h4>
        <h6>Full details of a product</h6>
      </div>
    </div>

    <div class="row">


      <!--<div class="bar-code-view">
<img src="assets/img/barcode1.png" alt="barcode">
<a class="printimg">
<img src="assets/img/icons/printer.svg" alt="print">
</a>
</div>-->

      <?php

    
      $arr = $_POST['tupdate1'];
      $i=0;

        $sql = "SELECT * FROM product WHERE p_id=".$arr;
        $query = mysqli_query($conn, $sql);


        foreach ($query as $p1) {
      ?>

          <div class="col-lg-4 col-sm-8">
            <div class="slider-product-details">
              <div class="owl-carousel owl-theme product-slide">
                <div class="slider-product">
                  <img src="assets/img/product/<?= $p1['p_image'] ?>" style="height: auto; width:auto" alt="img">
                  <h4><?= $p1['p_image'] ?></h4>

                  <h6>581kb</h6>
                </div>

              </div>
            </div>

          </div>
          <div class="col-lg-8 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="productdetails">

                  <ul class="product-bar">

                    <li>
                      <h4>Product</h4>
                      <h6><?= $p1['p_name']; ?></h6>
                    </li>
                    <li>
                      <h4>Product Code</h4>
                      <h6><?= $p1['p_code']; ?></h6>
                    </li>
                    <li>
                      <h4>Category</h4>
                      <?php
                      $cid = $p1['cat_id'];
                      $sql1 = "SELECT category_name FROM cat WHERE id=" . $cid;
                      $query1 = mysqli_query($conn, $sql1);
                      if ($row = mysqli_num_rows($query1) > 0) {
                        foreach ($query1 as $cat1) {

                      ?>
                          <h6><?= $cat1['category_name'] ?></h6>
                      <?php
                        }
                      }
                      ?>
                    </li>
                    <li>
                      <h4>Sub Category</h4>
                      <?php
                      $pid = $p1['subcat_id'];
                      $sql1 = "SELECT sub_name FROM sub_cat WHERE sub_id=" . $pid;
                      $query12 = mysqli_query($conn, $sql1);
                      if ($row = mysqli_num_rows($query12) > 0) {
                        foreach ($query12 as $cat12) {

                      ?>
                          <h6><?= $cat12['sub_name'] ?></h6>
                      <?php
                        }
                      }
                      ?>
                    </li>
                    <li><?php
                        $e_brand = $p1['b_id'];
                        $sql = "SELECT b_name FROM brand WHERE b_id=" . $e_brand;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                          foreach ($result as $brand) {
                        ?>
                          <h4>Brand</h4>
                          <h6><?= $brand['b_name'] ?></h6>
                      <?php
                          }
                        }
                      ?>
                    </li>
                    <li>
                      <h4>Unit</h4>
                      <h6><?= $p1['unit'] ?></h6>
                    </li>

                    <li>
                      <h4>Price</h4>
                      <h6><?= $p1['p_price'] ?></h6>
                    </li>
                    <li>
                      <h4>Status</h4>
                      <h6><?= $p1['pstatus'] ?></h6>
                    </li>
                    <li>
                      <h4>Description</h4>
                      <h6><?= $p1['p_desc'] ?></h6>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>



      <?php
 $i++;
        }

       
      
      

     ?>
    
      <div class="col-lg-12">
        <a href="pos.php" class="btn btn-cancel">Back</a>

      </div>
      

    </div>
  </div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>