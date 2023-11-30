<?php

include("header.php");

?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add Category</h4>
                <h6>Create new product Category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <form method="POST" action="code.php" id="myform" enctype="multipart/form-data">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">

                                <label>Category Name</label>
                                <input type="text" name="cname" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input type="text" name="mcode" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!--<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="desc"></textarea>
</div>-->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <input type="file" name="ufile" class="form-control">
                                    <div class="image-uploads">
                                        <!--<img src="assets/img/icons/upload.svg" alt="img">-->
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit" name="add_cat">Submit</button>
                            <a class=" btn btn-info me-3" href="categorylist.php">
                                Back
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php
include("footer.php");
?>