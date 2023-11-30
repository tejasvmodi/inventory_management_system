<?php
include("header1.php");
include("dbcon.php");
?>


<div class="container mt-5 mb-5">
     <div class="row d-flex justify-content-center">
          <div class="col-md-8">

               <div class="card">
                    <div class="text-left logo p-2 px-5"> <img src="https://i.imgur.com/2zDU056.png" width="50"> </div>
                    <div class="invoice p-5">
                         <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, <?php
                                     $u_mail = $_SESSION['email'];
                                   echo $u_mail;
                                     
                         

                                                                                                              ?></span> <span>You order has been confirmed and will be shipped in next two days!</span>
                         <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                              <table class="table table-borderless">
                                   <tbody>
                                        <tr>
                                             <td>
                                                  <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span><?=$currentDateTime = date('Y-m-d');?></span> </div>
                                             </td>
                                             <td>
                                                  <div class="py-2"> <span  class="d-block text-muted">Order No</span> <span><?php   echo $ref= uniqid(); ?></span> </div>
                                             </td>
                                             <td>
                                                  <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20"></span> </div>
                                             </td>
                                            <!-- <td>
                                                  <div class="py-2"> <span class="d-block text-muted">Shipping Address</span> <span></span> </div>
                                             </td>-->
                                        </tr>
                                   </tbody>
                              </table>
                         </div>
                         <div class="product border-bottom table-responsive">
                              <table class="table table-borderless">
                                   <tbody>
                                        <?php

                                        $total_price = 0;
                                        $r_price=0;
                                        $u_id = $_SESSION['userid'];

                                        $q = "SELECT * FROM `add_to_cart` WHERE `a_userid`=" . $u_id;
                        
                                        $r = mysqli_query($conn, $q);
                                        if (mysqli_num_rows($r) > 0) {
                                             //  print_r($_SESSION['cart']);
                                             foreach ($r as  $value) {
                                                  
                                               $aq=" SELECT  `p_name`, `r_price`  FROM `product` WHERE `p_id`=".$value['product_id'];
                                               $cj=mysqli_query($conn,$aq);
                                               foreach($cj as $value1){
			
                                        ?>
                                                  <tr>
                                                       <td width="20%"> <img src="assets/img/product/<?= $value['a_img']; ?>" width="90"> </td>
                                                       <td width="60%"> <span class="font-weight-bold"><?= $value1['p_name']?></span>
                                                            <div class="product-qty"> <span class="d-block">Quantity:<?= $value['a_quantity']?></span></div>
                                                       </td>
                                                       <td width="20%">
                                                            <div class="text-right"> <span class="font-weight-bold">₹ <?= number_format($value['a_price'], 2); ?></span> </div>
                                                            <?php $total_price = $total_price + $value['a_quantity'] * $value['a_price'];
                                                                   $r_price = $r_price + $value['a_quantity'] * $value1['r_price'];
                                                            
                                                            ?>
                                                       </td>
                                                  </tr>

                                             <?php
                                               }
                                             }

                                             ?>

                                   </tbody>
                              </table>
                         </div>
                         <div class="row d-flex justify-content-end">
                              <div class="col-md-5">
                                   <table class="table table-borderless">
                                        <tbody class="totals">
                                             <tr>
                                                  <td>
                                                       <div class="text-left"> <span class="text-muted">Subtotal</span></div>
                                                  </td>
                                                  <td>
                                                       <div class="text-right"> <span>₹ <?= number_format($total_price, 2); ?></span> </div>
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                                  </td>
                                                  <td>
                                                  <?php
                                                         if($total_price < 200)
                                                         {
                                                       ?>
                                                       <div class="text-right"> <span>₹ 50</span> </div>  <?php }
                                                         else{
                                                         ?>  <div class="text-right"> <span>₹ 0</span> </div><?php
                                                         }
                                                         ?>
                                                      
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       <div class="text-left"> <span class="text-muted">Tax Fee</span> </div>
                                                  </td>
                                                  <td> <?php
                                                         if($total_price < 200)
                                                         {
                                                       ?>
                                                       <div class="text-right"> <span> 0 %</span> </div>  <?php }
                                                         else{
                                                         ?>  <div class="text-right"> <span> 18 %</span> </div><?php
                                                         }
                                                         ?>
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       <div class="text-left"> <span class="text-muted">Discount</span> </div>
                                                  </td>
                                                  <td>
                                                 <?php if($total_price < 200)
                                                         {
                                                       ?>
                                                       <div class="text-right"> <span> 0 %</span> </div>  <?php }
                                                         else{
                                                         ?>  <div class="text-right"> <span> 10%</span> </div><?php
                                                         }
                                                         ?> </td>
                                             </tr>
                                             <tr class="border-top border-bottom">
                                                  <td>
                                                       <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                                  </td>
                                                  <td>
                                                       <?php
                                                         if($total_price < 200)
                                                         {
                                                       ?>
                                                       <div class="text-right"> <span id="total_price" class="font-weight-bold"> <?php $total_price = ($total_price + 50) ;
                                                                                                                                  
                                                                                                                                 echo "₹ " . number_format($total_price, 2) ?></span> </div>
                                                        <?php }
                                                         else{
                                                         ?>   <div class="text-right"> <span id="total_price" class="font-weight-bold"> <?php $total_price1 = ($total_price ) * 0.10 * 0.18;
                                                                                                                                  $total_price = $total_price - $total_price1;
                                                                                                                                  echo "₹ " . number_format($total_price, 2) ?></span> </div>
                                                
                                                            <?php
                                                         }
                                                         ?>
                                                  </td>
                                             </tr>
                                        </tbody>
                                   </table>

                              </div>
                         </div>
                         <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                         <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike Team</span>
                    </div>
                  <form method="post" action="code.php" class="d-inline">
                    <input type="hidden" name="txtrprice" value="<?=$r_price?>" >
                    <input type="hidden" name="txtref" value="<?=$ref?>">
                    <input type="hidden" name="txttotal" value="<?=$total_price?>">
             <input type='submit' class='btn btn-sm btn-warning my-2' name="ordertoproduct" value='Confirm Order'  style='margin-left:70%'>
                    <a href="pos.php" class="btn b-inline">back</a>
                    </form>
               </div>
          <?php
                                        } else {
                                             $_SESSION['message'] = "no item order";
                                             echo "  <script>
         window.location.href='pos.php';
           </script>";
                                        }
          ?>
          </div>
     </div>
</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>


<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>