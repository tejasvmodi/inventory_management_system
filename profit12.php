<?php
include("header.php");
include('dbcon.php');
$test = array();
$count = 0;

$sql = "SELECT `p_name`,`quantity` FROM `product` ORDER BY quantity DESC";
$w = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($w)) {

    $test[$count]["label"] = $row['p_name'];
    $test[$count]["y"] = $row['quantity'];
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
                    text: "Available Product "
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
    </div>
            <br>
            <br>
            <br>
    
                      <div class="row m-5">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Available Products</h4>
                       
                           
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
                                    $i=1;
                               $sql = "SELECT `p_image`,`p_name`,`quantity` FROM `product` ORDER BY quantity ASC";
                               $w = mysqli_query($conn, $sql);
                               while ($row = mysqli_fetch_array($w)) {





                                    ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="productimgname">
                                                        <a href="productlist.php" class="product-img">
                                                            <img src="assets/img/product/<?= $row['p_image']; ?>" alt="product">
                                                        </a>
                                                        <a href="productlist.php"><?= $row['p_name']; ?></a>
                                                    </td>
                                                    <td><?=$row['quantity'];?></td>
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
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <?php include('footer.php'); ?>