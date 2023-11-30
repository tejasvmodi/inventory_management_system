<?php
session_start();
include('dbcon.php');
include('dbcontroller.php');
$val=$_POST['sid'];
 
$sql="SELECT p_id,`p_name`,quantity,  `p_price`, `p_image` FROM `product` WHERE `subcat_id`=".$val;
$query=mysqli_query($conn,$sql);

  if(mysqli_fetch_assoc($query)>0)
  {
    foreach($query as $tej)
    {
?>
<div class="col-lg-3 col-sm-6 d-flex">
    <form method="POST" action="pos.php?id=<?=$tej['p_id'] ?>" enctype="multipart/form-data">
    <div class="productset flex-fill">
        <div class="productsetimg">
            <img src="assets/img/product/<?=$tej['p_image']?>" alt="img">
            <h6>Qty: <?=$tej['quantity']?></h6>
            <div class="check-product">
                <i class="fa fa-check"></i>
            </div>
            </div>
        <div class="productsetcontent">
            <?php
                $sql1="SELECT `sub_name` FROM `sub_cat` WHERE `sub_id`=".$val;
                $query=mysqli_query($conn,$sql1);
                if(mysqli_fetch_assoc($query)>0)
                {
                  foreach($query as $tej1)
                  {
            ?>
            <h5><?=$tej1['sub_name']?></h5>
            <?php
                  }
                }
            ?>
            <h4><?=$tej['p_name']?></h4>
            <h6> ₹<?= number_format($tej['p_price'],2);?></h6>
            <input type="hidden" name="name" value="<?=$tej['p_name']?>">
            <input type="text" name="quantity" value="1">
            <input type="hidden" name="price" value="<?=$tej['p_price']?>">
            <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add to Cart">

               </div>
       
    </div> 
    </form>
</div>
<?php
      
    }
}

?>