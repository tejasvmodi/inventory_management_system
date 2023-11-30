<?php
include('header.php');


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
                                <div class="profile-top">
                                    <div class="profile-content">
                                        <div class="profile-contentimg">
                                            <img src="assets/img/profiles/<?=$admin['u_img']; ?>" alt="img" id="blah">
                                            <div class="profileupload">
                                                <input type="file" id="imgInp" name="ufile">
                                                <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                                            </div>
                                        </div>
                                        <div class="profile-contentname">

                                            <h2><?= $admin['u_name']; ?></h2>
                                            <h4>Updates Your Photo and Personal Details.</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        
                                        <input type="text"  name="name" value="<?= $admin['u_name']; ?>">
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
                                    <input type="submit" name="edit_pro" class="btn btn-submit me-2" value="submit">
                                    <a href="dashboard.php" class="btn btn-cancel">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
</div>
</div>


<?php
include('footer.php');
?>