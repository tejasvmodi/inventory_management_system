<?php
session_start();
include('dbcon.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!--  <?php //   include('header.php');
            ?>-->
    <div class="container">
        <div class="col-md-12">
            <table class="table table-bordered my-5">
                <tr>
                    <th>ITEM PHOTO</th>
                    <th>ITEM NAME</th>
                    <th>ITEM PRICE</th>
                    <th>ITEM QUANTITY</th>
                    <th>ACTION</th>
                </tr>
                <?php

                $total_price = 0;
                $u_id = $_SESSION['userid'];

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
                                <tr>
                                    <td><img src="assets/img/product/<?= $addtocart['a_img']; ?>" alt="img" height="100px" width="100px"></td>
                                    <td><?php echo $quantity['p_name'] ?></td>
                                    <td> ₹<?php echo  number_format($addtocart['a_price'], 2); ?></td>
                                    <td><?php echo  $addtocart['a_quantity'] ?></td>
                                    <td>

                                        <form method="post" action="code.php"><button class="btn btn-danger Remove1" name="cc" id="<?= $addtocart['product_id'] ?>" value="<?= $addtocart['product_id'] ?>">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $total_price = $total_price + $addtocart['a_quantity'] * $addtocart['a_price']; ?>


                    <?php
                            }
                        }
                    }
                } else { ?>

                    <tr>
                        <td class="text-center" colspan="5"> CART IS EMAPTY PLEASE SELECT THE PRODUCT FIRST</td>
                    </tr>
                <?Php

                }
                ?>
                <tr>
                    <td colspan="2"></td>
                    <td>Total Price</td>
                    <td> ₹ <?= number_format($total_price, 2); ?></td>
                    <td>
                        <form method="post" action="code.php" class="d-inline">
                            <button class="btn btn-warning " name="clearall12" value="<?= $_SESSION['userid'] ?>"> Clear All</button>
                        </form>
                        <a href="pos.php" class="btn btn-cancel">back</a>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {


            $(".Remove").click(function() {
                var id = $(this).attr("id");
                var action = "Remove";
                $.ajax({
                    type: "POST",
                    url: 'action.php',
                    data: {
                        action: action,
                        id: id
                    },
                    success: function(data) {
                        // alert("you want to remove");
                        if (data == 1) {
                            //$(element).closest("td").fadeOut("slow");
                            window.location.href = "cart.php";
                        }
                    }
                });

            });



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
</body>

</html>