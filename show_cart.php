<?php
include('dbcon.php');
$pid = $_POST['sid'];
//echo $pid;
$query = "SELECT * FROM product WHERE subcat_id =" . $pid;
$res = mysqli_query($conn, $query);



if (mysqli_num_rows($res) < 1) {
  echo "No item";
}
while ($row = mysqli_fetch_array($res)) {
?>

  <div class="col-lg-3 col-sm-6 d-flex">
     <div class="productset  ">
        <div class="productsetimg ">
          <img src="assets/img/product/<?= $row['p_image'] ?>" class="img-responsive" width="307" height="240" alt="img">
          <h6>Qty: <?= $row['quantity'] ?></h6>
          <div class="check-product">
            <i class="fa fa-check"></i>
          </div>
        </div>
        <div class="productsetcontent">
          <?php
          $sql1 = "SELECT `sub_name` FROM `sub_cat` WHERE `sub_id`=" . $pid;
          $query = mysqli_query($conn, $sql1);
          if (mysqli_fetch_assoc($query) > 0) {
            foreach ($query as $tej1) {
          ?>
              <h5><?= $tej1['sub_name'] ?></h5>
          <?php
            }
          }
          ?>
          <h4><?= $row['p_name'] ?></h4>
          
          <h4> ₹ <?=number_format($row['p_price'], 2); ?></h4>
          <input type='number' id="quantity<?= $row['p_id'] ?>" class='form-control d-inline' value="1" max="<?= $row['quantity'] ?>" min="1">
          

             <input type='submit' class='btn btn-sm btn-warning my-2 add' value='Add TO cart' id=<?= $row['p_id'] ?> data-image="<?= $row['p_image'] ?>" data-rprice="<?= $row['r_price'] ?>" data-price="<?= $row['p_price'] ?>" data-name="<?= $row['p_name'] ?>" style='margin-left:50px'>

        </div>

      </div>
   
  </div>
<?php
}



?>