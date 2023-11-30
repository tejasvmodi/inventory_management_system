<?php
include("header.php");
include('dbcon.php');
$test = array();
$count = 0;

$sql = "SELECT p_id,p_name from product";
$w = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($w)) {

    $test[$count]["label"] = $row['p_name'];

    $s1 = 0;
    $s1s = "SELECT o_quantity FROM order_table WHERE p_id=" . $row['p_id'];
    $p = mysqli_query($conn, $s1s);
    foreach ($p as $s) {

        $s1 = $s['o_quantity'] + $s1;
    }
    $test[$count]["y"] = $s1;
    $count = $count + 1;
}


?>
<!DOCTYPE HTML>
<html>

<head>


    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Product Of Sales chart"
                },
                axisY: {
                    title: "per peice"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## ",
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div class="page-wrapper">
    <div class="col-md-10">
            <div class="p-5" id="chartContainer" style="height: 370px; width: 100%;"></div>
    
            <br>
            <br>
            <br>

            <div class="row m-5">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Most Order Product Chart</h4>
                       
                           
                        </div>
                   
                  
                    <div class="card-header  justify-content-between ">
                <div class="table-responsive ">
                <table class="table  datanew ">
                        <thead>           <tr>
                                        <th class="text-center">Pno</th>
                                        <th>Products</th>
                                        <th>Total Selling product </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                 $sql = "SELECT p_id,p_name,p_image from product";
                                 $w = mysqli_query($conn, $sql);
                                 $i = 1;
                                 while ($row = mysqli_fetch_array($w)) {
                                 
                                    
                                     $s1 = 0;
                                     $s1s = "SELECT o_quantity FROM order_table WHERE p_id=" . $row['p_id'];
                                     $p = mysqli_query($conn, $s1s);
                                     foreach ($p as $s) {
                                 
                                         $s1 = $s['o_quantity'] + $s1;
                                     }
                                    




                                    ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="productimgname">
                                                        <a href="productlist.php" class="product-img">
                                                            <img src="assets/img/product/<?= $row['p_image']; ?>" alt="product">
                                                        </a>
                                                        <a href="productlist.php"><?= $row['p_name']; ?></a>
                                                    </td>
                                                    <td><?=$s1 ?></td>
                                                </tr>
                                    <?php
                                                $i++;
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
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <?php include('footer.php'); ?>