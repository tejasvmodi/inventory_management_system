<?php
include('header1.php');
include('dbcon.php');

?>
<div class="page-wrapper ms-0">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-sm-12 tabs_wrapper">
                <div class="page-header ">
                    <div class="page-title">
                        <h4>Categories</h4>
                        <h6>Manage your purchases</h6>

                    </div>
                </div>
                <?php
                include("message.php");
                ?>
                <!--  <ul class=" owl-carousel owl-theme owl-product  border-0 ">

                    <?php /*
                    $query = "SELECT `id`, `category_name`, `image` FROM `cat`";
                    $result1 = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result1) > 0) {
                        foreach ($result1 as $cat12) {
                    ?>
                            <li id="headphone1">

                                <div class="product-details ">
                                    <button class="btn" id="sub_cat<?= $cat12['id']; ?>">
                                        <img src="assets/img/category/<?= $cat12['image']; ?>" alt="img">
                                        <h6><?= $cat12['category_name']; ?></h6>
                                    </button>
                                    <input type="hidden" id="hdnsub12_cat<?= $cat12['id']; ?>" value="<?= $cat12['id']; ?>" />
                                </div>

                            </li> 
                    <?php
                        //$cat_id= $cat12['id'];
                     }
                    }*/
                    ?>

                </ul>-->
                <ul class=" owl-carousel owl-theme owl-product  border-0 ">

                    <?php


                    // foreach($cat_id as $cat){
                    $query = "SELECT `sub_id`,`sub_name` FROM `sub_cat` ";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $cat1) {
                    ?>
                            <li id="headphone">

                                <div class="product-details ">
                                    <button class="btn" id="sub_cat<?= $cat1['sub_id']; ?>">
                                        <!--<img src="assets/img/product/product63.png" alt="img">-->
                                        <h6><?= $cat1['sub_name']; ?></h6>
                                    </button>
                                    <input type="hidden" id="hdnsub_cat<?= $cat1['sub_id']; ?>" value="<?= $cat1['sub_id']; ?>" />
                                </div>

                            </li>
                    <?php
                        }
                    }
                    //}

                    ?>

                </ul>
                <div class="tabs_container">
                    <div class="tab_content active" data-tab="fruits">
                        <div class="row" id="dataContainer">


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <div class="split-card">
                </div>
                <div class="card-body pt-0">
                    <div class="totalitem"><?php $i = 0; ?>
                        <h1>Order-List</h1>

                        <form method="post" action="code.php">
                        <button class="btn btn-warning " name="clearall12" value="<?=$_SESSION['userid']?>"> Clear All</button>
                        </form>                   </div>
                    <div class="product-table">
                        <?php
                        $u_id = $_SESSION['userid'];
                        $total_price = 0;
                        $total_price1 = 200;
                        $id = null;
                        if (!empty($_SESSION['cart'])) {

                            foreach ($_SESSION['cart'] as $key => $value) {
                                $id = $value['id'];
                                $quantity = $value['quantity'];
                                $price = $value['price'];
                                $img = $value['image'];
                            }

                            $ins = "INSERT INTO `add_to_cart`(`product_id`, `a_userid`, `a_quantity`, `a_price`, `a_img`)
                            VALUES ($id,$u_id,$quantity,$price,'$img')";
                            //echo $ins;
                            $res = mysqli_query($conn, $ins);
                            unset($_SESSION['cart'][$key]);
                        }


                        $q = "SELECT * FROM `add_to_cart` WHERE `a_userid`=" . $u_id;

                        $r = mysqli_query($conn, $q);
                        if (mysqli_num_rows($r) > 0) {
                            foreach ($r as $addtocart) {

                                $sql = "SELECT `p_name`,`quantity`FROM `product` WHERE `p_id`=" . $addtocart['product_id'];
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $quantity) {
                                        $q = $quantity['quantity'];
                                    }
                                    if ($q >= $addtocart['a_quantity']) {


                        ?>
                                        <ul class="product-lists">
                                            <li>
                                                <div class="productimg">
                                                    <div class="productimgs">

                                                        <img src="assets/img/product/<?= $addtocart['a_img'] ?>" alt="img">
                                                    </div>
                                                    <div class="productcontet">
                                                        <h4><?= $quantity['p_name']
                                                            ?>
                                                            <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a>
                                                        </h4>
                                                        <div class="productlinkset">
                                                            <h5>PT001</h5>
                                                        </div>
                                                        <div class="increment-decrement">
                                                            <div class="input-groups">
                                                                <!-- <input type="button" value="-" class="button-minus dec button">-->

                                                                quantity: <?= $addtocart['a_quantity']
                                                                            ?>
                                                                <!--<input type="button" value="+" class="button-plus inc button ">
                                -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li> ₹<?= number_format($addtocart['a_price'], 2);
                                                    ?></li>
                                            <?php
                                            $i++;
                                            $total_price = $total_price + $addtocart['a_quantity'] * $addtocart['a_price']; ?>

                                            <li>
                                                <form method="post" action="code.php"><button class="btn Remove1" name="cc" id="<?= $addtocart['product_id'] ?>" value="<?= $addtocart['product_id'] ?>"><img src="assets/img/icons/delete-2.svg" alt="img"></button>
                                                </form>
                                        </ul>
                        <?php

                                    } else {
                                        $u=$_SESSION['userid'];
                                        $sql = "DELETE FROM `add_to_cart` WHERE `a_userid`=$u AND `product_id`='" . $addtocart['product_id'] . "'";
                                      //  echo $sql;
                                       mysqli_query($conn, $sql);
                                      // $_SESSION['message']  = "please check the quantity before the use";
                                          
                                    }
                                } else {
                                    echo "hi";
                                }
                            }
                        } else {
                            echo "";
                        }
                        ?>
                    </div>
                </div>
                <div class="split-card">
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="setvalue">
                        <ul>
                            <li>
                                <h5>Total items :</h5>
                                <h6><?= $i ?></h6>
                            </li>
                            <li>
                                <h5>Sub Total :</h5>
                                <h6>₹<?= number_format($total_price, 2); ?></h6>
                            </li>

                            <li class="total-value">
                                <h5>Total </h5>
                                <h6>
                                    ₹ <?= number_format($total_price, 2); ?></h6>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="setvaluecash">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="assets/img/icons/cash.svg" alt="img" class="me-2">
                                        Cash
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="assets/img/icons/debitcard.svg" alt="img" class="me-2">
                                        Debit
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="assets/img/icons/scan.svg" alt="img" class="me-2">
                                        Scan
                                    </a>
                                </li>
                            </ul>
                        </div>-->
                    <div class="btn-totallabel">
                        <h5>Checkout</h5>
                        <h6><a href="ordertemplate.php" class="btn">₹ <?= number_format($total_price, 2); ?></a></h6>
                    </div>
                    <div class="btn-pos">
                        <ul>
                            <li>
                                <a class="btn"><img src="assets/img/icons/pause1.svg" alt="img" class="me-1">Hold</a>
                            </li>
                            <li>
                                <a class="btn"><img src="assets/img/icons/edit-6.svg" alt="img" class="me-1">Quotation</a>
                            </li>
                            <li>
                                <a class="btn"><img src="assets/img/icons/trash12.svg" alt="img" class="me-1">Void</a>
                            </li>
                            <li>
                                <a class="btn"><img src="assets/img/icons/wallet1.svg" alt="img" class="me-1">Payment</a>
                            </li>
                            <li>
                                <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img src="assets/img/icons/transcation.svg" alt="img" class="me-1"> Transaction</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--<div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Define Quantity</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="calculator-set">
                    <div class="calculatortotal">
                        <h4>0</h4>
                    </div>
                    <ul>
                        <li>
                            <a href="javascript:void(0);">1</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">2</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">3</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">4</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">5</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">6</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">7</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">8</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">9</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-closes"><img src="assets/img/icons/close-circle.svg" alt="img"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">0</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-reverse"><img src="assets/img/icons/reverse.svg" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hold order</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="hold-order">
                    <h2>4500.00</h2>
                </div>
                <div class="form-group">
                    <label>Order Reference</label>
                    <input type="text">
                </div>
                <div class="para-set">
                    <p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2">Submit</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Order</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" value="20">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Product Price</label>
                            <select class="select">
                                <option>Exclusive</option>
                                <option>Inclusive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label> Tax</label>
                            <div class="input-group">
                                <input type="text">
                                <a class="scanner-set input-group-text">
                                    %
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select class="select">
                                <option>Fixed</option>
                                <option>Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" value="20">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Sales Unit</label>
                            <select class="select">
                                <option>Kilogram</option>
                                <option>Grams</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2">Submit</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2">Submit</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Deletion</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete-order">
                    <img src="assets/img/icons/close-circle1.svg" alt="img">
                </div>
                <div class="para-set text-center">
                    <p>The current order will be deleted as no payment has been <br> made so far.</p>
                </div>
                <div class="col-lg-12 text-center">
                    <a class="btn btn-danger me-2">Yes</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recent Transactions</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tabs-sets">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" aria-controls="payment" aria-selected="false" role="tab">Payment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" aria-controls="return" aria-selected="false" role="tab">Return</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                            <div class="table-top">
                                <div class="search-set">
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
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Customer</th>
                                            <th>Amount </th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2022-03-07 </td>
                                            <td>INV/SL0101</td>
                                            <td>Walk-in Customer</td>
                                            <td>$ 1500.00</td>
                                            <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                    <img src="assets/img/icons/delete.svg" alt="img">
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!---payment-->
                        <div class="tab-pane fade" id="payment" role="tabpanel">
                            <div class="table-top">
                                <div class="search-set">
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
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Customer</th>
                                            <th>Amount </th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2022-03-07 </td>
                                            <td>0101</td>
                                            <td>Walk-in Customer</td>
                                            <td>$ 1500.00</td>
                                            <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                    <img src="assets/img/icons/delete.svg" alt="img">
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!---return sales-->
                        <div class="tab-pane fade" id="return" role="tabpanel">
                            <div class="table-top">
                                <div class="search-set">
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
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Customer</th>
                                            <th>Amount </th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2022-03-07 </td>
                                            <td>0101</td>
                                            <td>Walk-in Customer</td>
                                            <td>$ 1500.00</td>
                                            <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                    <img src="assets/img/icons/delete.svg" alt="img">
                                                </a>
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
    </div>
</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script>
    // sub category 
    $(document).ready(function() {

        <?php

        foreach ($result as $cat2) {
        ?>
            $("#sub_cat<?= $cat2['sub_id'] ?>").on('click', function() {
                let sid = $("#hdnsub_cat<?= $cat2['sub_id'] ?>").val();
                $.ajax({
                    url: 'show_cart.php',
                    type: "POST",
                    data: {
                        sid: sid
                    },
                    success: function(data) {
                        $("#dataContainer").hide();
                        $("#dataContainer").html(data);
                        $("#dataContainer").fadeIn("slow");
                    }
                });

            });
        <?php  } ?>

        function getProducts() {

            let sid = $("#hdnsub_cat2").val();
            $.ajax({
                url: 'show_cart.php',
                type: "POST",
                data: {
                    sid: sid
                },
                success: function(data) {
                    $("#dataContainer").hide();
                    $("#dataContainer").html(data);
                    $("#dataContainer").fadeIn("slow");
                }
            });

        }
        getProducts();
    });


    $(document).ready(function() {
        /*  show_cart1();

          function show_cart1() {
            $.ajax({
              type: "POST",
              url: "show_cart.php",
              success: function(data) {
                $("#show_cart").html(data);
              }
            });
          }*/


        $(document).on("click", ".add", function() {
            var id = $(this).attr("id");
            let name = $(this).data("name");
            let price = $(this).data("price");
            let qid = "#quantity" + id;
            let quantity = $(qid).val();
            let image = $(this).data("image");
            let rprice = $(this).data("rprice");

            let element = this;


            $.ajax({
                type: "POST",
                url: "add_to_cart.php",
                data: {
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity,
                    image: image,
                    rprice: rprice
                },
                success: function(data) {
                    window.location.href = "pos.php";

                    $(element).closest("td").fadeOut("slow");

                }
            });
        });
    });


    $(document).ready(function() {


        $(".Remove").click(function() {
            var id = $(this).attr("id");
            var action = "Remove";
            var u_id = "<?= $_SESSION['userid']; ?>";

            $.ajax({
                type: "POST",
                url: 'action.php',
                data: {
                    u_id: u_id,
                    action: action,
                    id: id
                },
                success: function(data) {
                    //alert("you want to remove");
                    if (data == 1) {
                        $(element).closest("td").fadeOut("slow");
                        //window.location.href="cart.php";
                    }
                }
            });

        });
        /* $(".Remove1").click(function() {
             var id = $(this).attr("id");
             var action = "Remove1";
             var u_id = "<?= $_SESSION['userid']; ?>";
             let element = this;
             $.ajax({
                 type: "POST",
                 url: 'action.php',
                 data: {
                     u_id: u_id,
                     action: action,
                     id: id
                 },
                 success: function(data) {
                     // alert("you want to remove");
                     if (data == 1) {
                         $(element).closest("ul").fadeOut("slow");
                         // window.location.href="pos.php";
                     }
                 }
             });

         });*/



        $(".clearall").click(function() {
            var action1 = "clear";
            $.ajax({
                type: "POST",
                url: 'action.php',
                data: {
                    action1: action1
                },
                success: function(data) {
                    if (data == 1) {
                        window.location.href = "pos.php";
                    }
                }
            });
        });
    });
</script>
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