<?php
include('header1.php');
include('dbcon.php');

?>
<div class="page-wrapper">
    <div class="content">
        <form method="post" action="code.php" enctype="multipart/form-data">
            <div class="page-header">

                <div class="page-title">
                    <h4>Profile</h4>
                    <h6>User Profile</h6>
                </div>
            </div>
            <?php
            include('message.php');
            $u_mail = $_SESSION['email'];
            $sel = "SELECT  * FROM `login` WHERE u_mail='$u_mail'";
            $query = mysqli_query($conn, $sel);
            if (mysqli_num_rows($query) > 0) {
                foreach ($query as $admin) {
            ?>

                    <div class="card">
                        <div class="card-body">
                            <div class="profile-set">
                                <div class="profile-head">
                                </div>
                                <form method="post" action="code.php" enctype="multipart/form-data">
                                    <div class="profile-top">
                                        <div class="profile-content">
                                            <div class="profile-contentimg">
                                                <img src="assets/img/customer/<?= $admin['u_img'] ?>" alt="img" id="blah">
                                                <div class="profileupload">
                                                    <input type="file" id="imgInp" name="ufile">
                                                    <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                                                </div>
                                            </div>
                                            <div class="profile-contentname">

                                                <h2><?= $admin['u_name'] ?></h2>
                                                <h4>Updates Your Photo and Personal Details.</h4>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="William" value="<?= $admin['u_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="<?= $admin['u_mail'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $admin['u_mobile'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="pass-group">
                                            <input type="password" name="pass" class=" pass-input" value="<?= $admin['u_pass'] ?>">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">

                                    <input type="hidden" name="id" value="<?= $admin['u_id'] ?>">
                                    <input type="submit" name="edit_pro12" class="btn btn-submit" style="margin-left: 75%"  value="submit">
                                    <a href="pos.php" class="btn btn-cancel">Back</a>
                                </div>

                            </div>
        </form>

        <br>
        <br>

        <br>
        <br>

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
                <div class="col-lg-12 text-center">
                    <h2 class="text-muted">Order Information</h2>
                </div>
            </div>
    <?php
                }
            }
    ?>
    <div class="wordset">
       <!-- <ul>
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

        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead class="text-center">

                            <tr>
                                <th>No</th>
                                <th>order id</th>
                                <th>Product Name</th>
                                <th>Date</th>
                                <th>Amount </th>
                                <th>view order</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $u_mail1 = $_SESSION['email'];
                            $sel1 = "SELECT  * FROM `login` WHERE u_mail='$u_mail1'";
                            $query1 = mysqli_query($conn, $sel1);
                            foreach ($query1 as $u) {
                                $u_id = $u['u_id'];
                            }
                            $sql = "SELECT * FROM `order_table` WHERE `user_id`=' $u_id' AND order_status='ordered' ORDER BY `order_total` DESC";
                            $query = mysqli_query($conn, $sql);
                                echo "<h4 class='card-title'>Ordered product list</h4>";
                            if (mysqli_num_rows($query) > 0) {
                            ?><?php $x=0;
                            
                            
                        
                               
                                
                            
                                foreach ($query as $valueorder1){
                                    $p = $valueorder1['p_id'];
                                    $a1 = "SELECT p_name FROM product WHERE p_id=" . $p;
                                    $s = mysqli_query($conn, $a1);
                                    foreach ($s as $ll) {
                                        $q = $ll['p_name'];
                                    $x++;?>  
                                    <tr class="text-left">
                                    <td><?=$x?></td>
                                    <td><?= $valueorder1['order_id']; ?></td>
                                    <td><?= $q ?></td>
                                    <td><?= $valueorder1['order_date']; ?></td>
                                    <td> ₹<?= number_format($valueorder1['order_total'], 2); ?></td>
                                    <td><form method="post" action="o_detail1.php">
                                                <button type="submit" Name="tupdate1" value="<?=$valueorder1['p_id']?>">
                                            <img src="assets/img/icons/eye.svg" alt="img">
                                        </button>
                                    </form>
                                </td>
                                    </tr>
                           
                                <?php
                                    }
                                }
                        }else{ $sql = "SELECT * FROM `order_table` WHERE `user_id`=' $u_id' AND order_status='pending'";
                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0) {
                            ?><?php $x=0;
                           
                                foreach ($query as $valueorder1){
                                    $p = $valueorder1['p_id'];
                                    $a1 = "SELECT p_name FROM product WHERE p_id=" . $p;
                                    $s = mysqli_query($conn, $a1);
                                    foreach ($s as $ll) {
                                        $q = $ll['p_name'];
                                    $x++;?>  
                                    <tr class="text-left">
                                    <td><?=$x?></td>
                                    <td><?= $valueorder1['order_id']; ?></td>
                                    <td><?= $q ?></td>
                                    <td><?= $valueorder1['order_date']; ?></td>
                                    <td> ₹<?= number_format($valueorder1['order_total'], 2); ?></td>
                                    <td><form method="post" action="o_detail1.php" >
                                                <button type="submit" Name="tupdate1" value="<?=$valueorder1['p_id']?>">
                                            <img src="assets/img/icons/eye.svg" alt="img">
                                        </button>
                                    </form>
                                </td>
                                    </tr>
                          
                                <?php
                            }
                        }
                        }
                     } ?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        </form>

    </div>

</div>

<?php
include('footer.php');
?>