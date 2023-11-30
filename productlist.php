<?php

include('header.php');
include("dbcon.php");
?>

<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Product List</h4>
        <h6>Manage your products</h6>
        <?php
        include('message.php');
        ?>
      </div>
      <div class="page-btn">
        <a href="addproduct.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
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

        <div class="card mb-0" id="filter_inputs">
          <div class="card-body pb-0">
            <div class="row">
              <div class="col-lg-12 col-sm-12">
                <div class="row">
                  <div class="col-lg col-sm-6 col-12">
                    <div class="form-group">
                      <select class="select">
                        <option>Choose Product</option>
                        <option>Macbook pro</option>
                        <option>Orange</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg col-sm-6 col-12">
                    <div class="form-group">
                      <select class="select">
                        <option>Choose Category</option>
                        <option>Computers</option>
                        <option>Fruits</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg col-sm-6 col-12">
                    <div class="form-group">
                      <select class="select">
                        <option>Choose Sub Category</option>
                        <option>Computer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg col-sm-6 col-12">
                    <div class="form-group">
                      <select class="select">
                        <option>Brand</option>
                        <option>N/D</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg col-sm-6 col-12 ">
                    <div class="form-group">
                      <select class="select">
                        <option>Price</option>
                        <option>150.00</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-1 col-sm-6 col-12">
                    <div class="form-group">
                      <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                    </div>
                  </div>
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
                <th>Product Name</th>
                <th>Category </th>
                <th>Brand</th>
                <th>price</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Created By</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
             $sql = "SELECT * FROM product";
              $query = mysqli_query($conn, $sql);
              if (mysqli_num_rows($query) > 0) {
                foreach ($query as $product) {



              ?>
                  <tr>
                    <td>
                      <label class="checkboxs">
                        <input type="checkbox">
                        <span class="checkmarks"></span>
                      </label>
                    </td>
                    <td class="productimgname">
                      <a href="javascript:void(0);" class="product-img">
                        <img src="assets/img/product/<?= $product['p_image'] ?>" alt="product">
                      </a>
                      <a href="javascript:void(0);"><?= $product['p_name'] ?></a>
                    </td>
                    <?php
                    $cid = $product['cat_id'];
                    $sql1 = "SELECT category_name FROM cat WHERE id=" . $cid;
                    $query1 = mysqli_query($conn, $sql1);
                    if ($row = mysqli_num_rows($query1) > 0) {
                      foreach ($query1 as $cat1) {

                    ?>
                        <td><?= $cat1['category_name'] ?></td>
                      <?php
                      }
                    }

                    $bid = $product['b_id'];
                    $sql12 = "SELECT b_name FROM brand WHERE b_id=" . $bid;
                    $query12 = mysqli_query($conn, $sql12);
                    if (mysqli_num_rows($query12) > 0) {
                      foreach ($query12 as $cat12) {

                      ?>
                        <td><?= $cat12['b_name'] ?></td>
                    <?php
                      }
                    }
                    ?>
                    <td>₹ <?= number_format($product['p_price'],2) ?></td>
                    <td><?= $product['unit'] ?></td>
                    <td><?= $product['quantity']?></td>
                    <td>Admin</td>
                    <td>
                      <form action="product-details.php" method="POST" class="d-inline">
                        <button type="submit" name="view_p" value="<?= $product['p_id']; ?> " class="btn btn-info btn-sm"><img src="assets/img/icons/eye.svg" alt="img"></button>
                      </form>
                      <form action="editproduct.php" method="POST" class="d-inline">
                        <button type="submit" name="update_p" value="<?= $product['p_id']; ?> " class="btn btn-info btn-sm"><img src="assets/img/icons/edit.svg" alt="img"></button>
                      </form>
                      <form action="code.php" method="POST" class="d-inline">
                        <button type="submit" name="delete_p" value="<?= $product['p_id']; ?> " class="btn btn-info btn-sm"><img src="assets/img/icons/delete.svg" alt="img"></button>
                      </form>

                    </td>
                  </tr>
              <?php
                }
              }
              ?>


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