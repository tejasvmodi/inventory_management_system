<?php

include('header.php');


?>
<form action="code.php" method="POST" id="addbrand" enctype="multipart/form-data">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Brand ADD</h4>
                    <h6>Create new Brand</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="bname">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!--<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="bdesc"></textarea>
</div>-->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Brand Image</label>
                                <div class="image-upload">
                                    <input type="file" name="bfile">
                                    <div class="image-uploads">
                                        <img src="assets/img/icons/upload.svg" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="Submit" name="addbrand" class="btn btn-submit me-2">
                            <a href="brandlist.php" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>