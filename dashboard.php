<?php

use function PHPSTORM_META\elementType;

include("header.php");
include('dbcon.php');
?>

<div class="page-wrapper">
    <div class="content">
        <?php
        include("message.php");
        ?>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <?php
                        $t1 = 0;
                        $sql = "SELECT r_price,quantity FROM product";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = (float)$row['r_price'] * (float)$row['quantity'];
                                $t1 = $t1 + $total;
                                $f1 = $t1;
                            }
                        } else {
                            $f1 = 0;
                        }

                        ?>
                        <h5> ₹<span class="counters" data-count="<?= (int)$f1 ?>"> <? echo number_format($f1, 2); ?></span></h5>
                        <h6>Total Product Price </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                    </div>
                    <?php
                    $currentDateTime = date('Y-m-d');
                    $t2 = 0;
                    $sql = "SELECT `order_total` FROM `order_table` WHERE `order_date`='$currentDateTime' AND order_status='ordered'";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {


                        foreach ($query as $total1) {
                            $t2 = (int)$total1['order_total'] + $t2;
                        }
                    } else {
                        $t2 = 0;
                    }



                    ?>
                    <div class="dash-widgetcontent">
                        <h5>₹<span class="counters" data-count="<?= $t2 ?>"><?= (int)$total1['order_total'] ?></span></h5>
                        <h6>Total Sales Today</h6>

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                    </div>
                    <?php
                  
                    $t3 = 0;
                    $sql = "SELECT `order_total` FROM `order_table` WHERE order_status='ordered'";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $total12) {
                            $t3 = (int)$total12['order_total'] + $t3;
                        }
                    } else {
                        $t3 = 0;
                    }

                    ?>
                    <div class="dash-widgetcontent">
                        <h5>₹<span class="counters" data-count="<?= $t3 ?>"><?= $t3 ?></span></h5>
                        <h6>Total Sale Amount</h6>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">

                <div class="dash-widget dash3">

                    <div class="dash-widgetimg">

                        <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                    </div>
                    <?php
                    $profit1 = 0;
                    $saq = "SELECT  * FROM `order_table` WHERE order_status='ordered'";
                    $quer1 = mysqli_query($conn, $saq);
                    if (mysqli_num_rows($quer1) > 0) {
                        foreach ($quer1 as $profit) {
                            $q="SELECT r_price FROM product WHERE `p_id`=" . $profit['p_id'];
                            $q1=mysqli_query($conn,$q);
                            foreach($q1 as $ads)
                            {
                               $a=$ads['r_price']* $profit['o_quantity'];
                            
                           // foreach($q1 as $a1){";
                            $p1 = $profit['order_total'];
                            $profit1 = $p1 -$a+$profit1;
                           }
                    }
                    } else {
                        $p1 = 0;
                    }
                    ?>
                    <div class="dash-widgetcontent">
                        <h5>₹<span class="counters" data-count="<?= $profit1 ?>"><?= $profit1 ?></span></h5>
                        <h6>Total profit Amount</h6>
                    </div>


                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 d-flex">

                <div class="dash-count">
                    <?php
                    $result = mysqli_query($conn, "SELECT count(u_id) as total from login");
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="dash-counts">
                        <h4><?= $data['total'] ?></h4>
                        <h5>Customers</h5>
                    </div>

                    <div class="dash-imgs">

                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(p_id) as total from product");
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <h4><?= $data['total'] ?></h4>
                        <h5>Products</h5>
                    </div>
                    <div class="dash-imgs">
                        <a href="productlist.php"><i data-feather="user-check"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(id) as total from cat");
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <h4><?= $data['total'] ?></h4>
                        <h5>Category</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(sub_id) as total from sub_cat");
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <h4><?= $data['total'] ?></h4>
                        <h5>Sub_Category</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div class="table-responsive ">
                <h4 class='card-title'>Order List</h4>
                    <table class="table  datanew">
                        <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Reference id</th>
                                        <th>Product Name </th>
                                        <th>User</th>
                                        <th>Quantity</th>
                                        <th>total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT  `order_id`, `p_id`,`o_quantity`, `user_id`, `order_total` FROM `order_table` WHERE order_status='pending'";
                                    $query = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($query) > 0) {

                                        $i = 1;
                                        foreach ($query as $o) {
                                            
                                            $p = $o['p_id'];
                                            $a1 = "SELECT p_name FROM product WHERE p_id=" . $p;
                                            $s = mysqli_query($conn, $a1);
                                            foreach ($s as $ll) {
                                                
                                                $q = $ll['p_name'];
                                            }
                                    ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $o['order_id']; ?></td>
                                                <td><?= $q ?></td>
                                                <?php $u = "SELECT  `u_name` FROM `login` WHERE `u_id`='" . $o['user_id'] . "'";
                                                $l1 = mysqli_query($conn, $u);
                                                foreach ($l1 as $l2) { ?>
                                                    <td><?= $l2['u_name']; ?></td>
                                                <?php
                                                } ?>
                                                <td><?= $o['o_quantity']; ?></td>
                                                <td>₹ <?=number_format($o['order_total'],2); ?></td>
                                                <td>
                                                    <form method="post" Action='code.php'>
                                                        <input type="hidden" name="pid" value="<?= $o['p_id']; ?>">
                                                        <input type="hidden" name="uid" value="<?= $o['user_id']; ?>">
                                                        <input type="hidden" name="tid" value="<?= $o['order_id']; ?>">
                                                        <input type="submit" Name="o1" value="ordered">
                                                    </form>
                                                </td>
                                                <?php
                                                $i++;
                                            }
                                        } else {
                                            $sql = "SELECT  `p_id`,`order_id`, `p_id`,`o_quantity`, `user_id`, `order_total` FROM `order_table` WHERE order_status='ordered'";
                                            $query = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($query) > 0) {
                                                $i = 1;
                                                foreach ($query as $o) {
                                                ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $o['order_id']; ?></td>
                                                <?php
                                                    $p = $o['p_id'];
                                                    $a1 = "SELECT `p_name` FROM `product` WHERE `p_id`=" . $p;
                                                    $s = mysqli_query($conn, $a1);
                                                    foreach ($s as $ll) { ?>
                                                    <td><?= $ll['p_name']; ?></td>
                                                <?php
                                                    }


                                                    $u = "SELECT  `u_name` FROM `login` WHERE `u_id`='" . $o['user_id'] . "'";
                                                    $l1 = mysqli_query($conn, $u);
                                                    foreach ($l1 as $l2) { ?>
                                                    <td><?= $l2['u_name']; ?></td>
                                                <?php
                                                    } ?>
                                                     <td><?= $o['o_quantity']; ?></td>
                                                <td>₹ <?=number_format($o['order_total'],2); ?></td>
                                                <td>
                                                    <form method="post" action="o_detail.php">
                                                        <button type="submit" Name="tupdate" value="<?=$o['p_id']; ?>">
                                                          
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </button>
                                                    </form>
                                                </td>
                                    <?php
                                                    $i++;
                                                }
                                            }
                                        }

                                    ?>
                                </tbody>
                            </table>
                            <!--<p></p>-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Recently Added Products</h4>
                        <div class="dropdown">
                            <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a href="productlist.php" class="dropdown-item">Product List</a>
                                </li>
                                <li>
                                    <a href="addproduct.php" class="dropdown-item">Product Add</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Pno</th>
                                        <th>Products</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM product ORDER BY p_id DESC";
                                    $query = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        $i = 1;

                                        foreach ($query as $result) {
                                            if ($i < 11) {
                                                $t1 = $result['p_price'];




                                    ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="productimgname">
                                                        <a href="productlist.php" class="product-img">
                                                            <img src="assets/img/product/<?= $result['p_image']; ?>" alt="product">
                                                        </a>
                                                        <a href="productlist.php"><?= $result['p_name']; ?></a>
                                                    </td>
                                                    <td>₹<?= number_format($t1,2); ?></td>
                                                </tr>
                                    <?php
                                                $i++;
                                            }
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
        <div class="card mb-0">
            <div class="card-body">
                <h4 class='card-title'>Products</h4>
                <div class="table-responsive ">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>
                                    SNO
                                </th>
                                <th>Product Name</th>
                                <th>Category </th>
                                <th>Brand</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"><?php
                                                    $sql = "SELECT `p_id`, `p_name`,  `cat_id`, `b_id`,`p_image` , `minimum_qty`, `quantity` FROM `product` WHERE quantity<=minimum_qty";
                                                    $rs = mysqli_query($conn, $sql);
                                                    $row = mysqli_num_rows($rs);
                                                    if ($row > 0) {

                                                        $v = 0;
                                                        foreach ($rs as $product1) {
                                                            $v++;

                                                    ?>
                                    <tr>
                                        <td><?= $v ?></td>
                                        <td class="productimgname"> <a href="productlist.php" class="product-img">
                                                <img src="assets/img/product/<?= $product1['p_image']; ?>" alt="product">
                                            </a><?= $product1['p_name']; ?></td>

                                        <?php

                                                            $sql1 = "SELECT `category_name`   FROM `cat` WHERE id='" . $product1['cat_id'] . "'";
                                                            $rs1 = mysqli_query($conn, $sql1);
                                                            $row1 = mysqli_num_rows($rs1);
                                                            foreach ($rs1 as $product12) {
                                                                $c_name = $product12['category_name'];
                                                            }
                                        ?>
                                        <td><?= $c_name ?></td>
                                        <?php

                                                            $sql12 = "SELECT `b_name`  FROM `brand` WHERE b_id='" . $product1['b_id'] . "'";
                                                            $rs12 = mysqli_query($conn, $sql12);
                                                            $row12 = mysqli_num_rows($rs12);
                                                            foreach ($rs12 as $product122) {
                                                                $b_name = $product122['b_name'];
                                                            }
                                        ?>
                                        <td><?= $b_name ?></td>
                                        <td>
                                            <form method="post" action="code.php">
                                                <input type="text" name="qty12" value=<?= $product1['quantity']; ?>>
                                        </td>
                                        <td>
                                            <input type="hidden" Name="txtv1" value=<?= $product1['p_id'] ?>>
                                            <input type="submit" Name="v1" value="Update">
                                            </form>
                                        </td>
                                        <?php

                                                        }
                                                    } else {
                                                        $sql = "SELECT `p_id`,`p_name`,  `cat_id`, `b_id`,`p_image` , `minimum_qty`, `quantity` FROM `product`";
                                                        $rs = mysqli_query($conn, $sql);
                                                        $row = mysqli_num_rows($rs);
                                                        if ($row > 0) {
                                                            $v = 0;
                                                            foreach ($rs as $product1) {
                                                                $v++;

                                        ?>
                                    <tr>
                                        <td><?= $v ?></td>
                                        <td class="productimgname"> <a href="productlist.php" class="product-img">
                                                <img src="assets/img/product/<?= $product1['p_image']; ?>" alt="product">
                                            </a><?= $product1['p_name']; ?></td>

                                        <?php

                                                                $sql1 = "SELECT `category_name`   FROM `cat` WHERE id='" . $product1['cat_id'] . "'";
                                                                $rs1 = mysqli_query($conn, $sql1);
                                                                $row1 = mysqli_num_rows($rs1);
                                                                foreach ($rs1 as $product12) {
                                                                    $c_name = $product12['category_name'];
                                                                }
                                        ?>
                                        <td><?= $c_name ?></td>
                                        <?php

                                                                $sql12 = "SELECT `b_name`  FROM `brand` WHERE b_id='" . $product1['b_id'] . "'";
                                                                $rs12 = mysqli_query($conn, $sql12);
                                                                $row12 = mysqli_num_rows($rs12);
                                                                foreach ($rs12 as $product122) {
                                                                    $b_name = $product122['b_name'];
                                                                }
                                        ?>
                                        <td><?= $b_name ?></td>
                                        <td><?= $product1['quantity']; ?></td>
                                        <td>
                                            <form method="post" action="p_detail.php"><input type="hidden" Name="txtv1" value="<?= $product1['p_id'] ?>">
                                                <input type="submit" Name="v1" value="view">
                                            </form>
                                        </td>
                            <?php
                                                            }
                                                        }
                                                    }

                            ?>
                                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php

include("footer.php");

?>