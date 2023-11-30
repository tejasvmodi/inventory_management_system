<?php
session_start();
include('dbcon.php');
//<--------------------------------------------------------------------------------category code started------------------------------------------------->
//category update code start:
if (isset($_POST['update_cat'])) {
  $cat_id = mysqli_real_escape_string($conn, $_POST['u_id']);

  $name = $_POST['cname'];
  $mcode = $_POST['mcode'];




  if ($_FILES['filex']['name'] != null) {
    $image = $_FILES['filex']['name'];

    $path = "assets/img/category/";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $name . '.' . $image_ext;


    $sqln = "UPDATE  cat SET  category_name='$name', category_code='$mcode',image='$filename' WHERE id='$cat_id'";

    $sqlrn = mysqli_query($conn, $sqln);

    if ($sqlrn) {
      move_uploaded_file($_FILES['filex']['tmp_name'], $path . '/' . $filename);
      $_SESSION['message'] = "Category Successfully updated";

      header('Location:categorylist.php');
    } else {
      $_SESSION['message'] = "Category not updated";

      header('Location:categorylist.php');
    }
  } else {


    $sqln = "UPDATE  cat SET  category_name='$name', category_code='$mcode' WHERE id='$cat_id'";

    $sqlrn = mysqli_query($conn, $sqln);

    if ($sqlrn) {
      // move_uploaded_file($_FILES['filex']['tmp_name'],$path.'/'.$filename);
      $_SESSION['message'] = "Category Successfully updated";

      header('Location:categorylist.php');
    } else {
      $_SESSION['message'] = "Category not updated";

      header('Location:categorylist.php');
    }
  }
}

//category add:-

if (isset($_POST['add_cat'])) {
  $name = $_POST['cname'];
  $mcode = $_POST['mcode'];


  $image = $_FILES['ufile']['name'];

  $path = "assets/img/category/";


  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = $name . '.' . $image_ext;

  $query = "INSERT INTO cat (category_name,category_code,image)
    VALUES ('$name','$mcode','$filename')";
  $run_q = mysqli_query($conn, $query);
  if ($run_q) {
    move_uploaded_file($_FILES['ufile']['tmp_name'], $path . '/' . $filename);
    $_SESSION['message'] = "Category Successfully added";

    header('Location:categorylist.php');
  } else {
    $_SESSION['message2'] = "all fields are required or category already exists";

    header('Location:error505.php');
  }
}
//delete category 

if (isset($_POST['del_cat'])) {
  $cat_id = mysqli_real_escape_string($conn, $_POST['del_cat']);

  $del = "DELETE FROM cat WHERE id='$cat_id'";
  $delrn = mysqli_query($conn, $del);

  if ($delrn) {
    $_SESSION['message'] = 'category deleted successfully';
    header("Location: categorylist.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'category not deleted successfully';
    header("Location: categorylist.php");
    exit(0);
  }
}
//<------------------------------------------------------------------subcategory code started ---------------------------------------------------->
//subcategory added (code start):

if (isset($_POST['sub_cat'])) {
  $sel = $_POST['select'];
  $scname = $_POST['scname'];
  $sccode = $_POST['sccode'];
  $scdesc = $_POST['scdesc'];

  /*echo $sel;
  echo $scname;
  echo $sccode;
  echo $scdesc;
*/
  $sql = "INSERT INTO sub_cat (sub_name,sccode,sub_desc,cat_id) VALUES('$scname','$sccode','$scdesc','$sel')";
  if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'sub-category added successfully';
    header("Location:subcategorylist.php");
    exit(0);
  } else {
    $_SESSION['message2'] = 'sub-category already exists';
    header("Location:error505.php");
    exit(0);
  }
}


//subcategory deleted
if (isset($_POST['delete_sc'])) {
  $cat_id = mysqli_real_escape_string($conn, $_POST['delete_sc']);

  $del = "DELETE FROM sub_cat WHERE sub_id='$cat_id'";
  $delrn = mysqli_query($conn, $del);

  if ($delrn) {
    $_SESSION['message'] = 'subcategory deleted successfully';
    header("Location: subcategorylist.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'subcategory not deleted successfully';
    header("Location: subcategorylist.php");
    exit(0);
  }
}
//subcategory updated
if (isset($_POST['update_sub_cat1'])) {
  $subcat_id = mysqli_real_escape_string($conn, $_POST['update_sub_cat']);
  //echo $subcat_id;
  $sub_name = $_POST['subcat_name'];
  $sub_code = $_POST['subcat_code'];
  $sub_desc = $_POST['subcat_desc'];
  $cat_id = $_POST['category'];

  $upd_sc = "UPDATE  sub_cat SET  sub_name	='$sub_name', sccode='$sub_code',sub_desc='$sub_desc',cat_id='$cat_id' WHERE sub_id='$subcat_id'";

  $sqlrn = mysqli_query($conn, $upd_sc);

  if ($sqlrn) {
    $_SESSION['message'] = 'subcategory updated successfully';
    header("Location: subcategorylist.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'subcategory not updated successfully';
    header("Location: subcategorylist.php");
    exit(0);
  }
}

//<----------------------------------------------------------------------------product code started-------------------------------------------------->
//product add:
if (isset($_POST['pro_add'])) {


  $cat_id = mysqli_real_escape_string($conn, $_POST['category']);
  $p_code = mysqli_real_escape_string($conn, $_POST['pcode']);
  $subcat_id = mysqli_real_escape_string($conn, $_POST['subcat']);
  $pname = mysqli_real_escape_string($conn, $_POST['pname']);
  $brand = mysqli_real_escape_string($conn, $_POST['brand']);
  $unit = mysqli_real_escape_string($conn, $_POST['punit']);
  $minQuality = mysqli_real_escape_string($conn, $_POST['minQty']);
  $Quality = mysqli_real_escape_string($conn, $_POST['Quantity']);

  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
  $discount = mysqli_real_escape_string($conn, $_POST['disc']);
  $prealprice = mysqli_real_escape_string($conn, $_POST['prealprice']);
  $psellingprice = mysqli_real_escape_string($conn, $_POST['pprice']);

  $image = $_FILES['pfile']['name'];

  $path = "assets/img/product/";


  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = $pname . '.' . $image_ext;

  $query = "INSERT INTO product (p_name,p_code,cat_id,subcat_id,unit,b_id,p_desc,minimum_qty,quantity,discount,r_price,p_price,pstatus,p_image)
    VALUES ('$pname','$p_code','$cat_id','$subcat_id','$unit','$brand','$pdesc','$minQuality','$Quality','$discount','$prealprice','$psellingprice','$status','$filename')";

  $run_q = mysqli_query($conn, $query);

  if ($run_q) {
    move_uploaded_file($_FILES['pfile']['tmp_name'], $path . '/' . $filename);
    $_SESSION['message'] = "product Successfully added";

    header('Location:productlist.php');
  } else {
    $_SESSION['message2'] = "all fields are required or product already exists";

    header('Location:error505.php');
  }
}



//update product :-
if (isset($_POST['update_product'])) {
  $p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
  $cat_id = mysqli_real_escape_string($conn, $_POST['category']);
  $subcat_id = mysqli_real_escape_string($conn, $_POST['subcat']);
  $pname = mysqli_real_escape_string($conn, $_POST['pname']);
  $brand = mysqli_real_escape_string($conn, $_POST['brand']);
  $unit = mysqli_real_escape_string($conn, $_POST['punit']);
  $minQuality = mysqli_real_escape_string($conn, $_POST['minQty']);
  $Quality = mysqli_real_escape_string($conn, $_POST['Quantity']);
  $p_code = mysqli_real_escape_string($conn, $_POST['pcode']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
  $discount = mysqli_real_escape_string($conn, $_POST['disc']);
  $prealprice = mysqli_real_escape_string($conn, $_POST['prealprice']);
  $psellingprice = mysqli_real_escape_string($conn, $_POST['pprice']);

  //echo $p_id ."<br>".$cat_id."<br>".$subcat_id."<br>".$pname."<br>".$brand."<br>".$unit."<br>".$minQuality."<br>".$Quality."<br>".$status."<br>".$pdesc."<br>".$discount."<br>".$prealprice."<br>".$psellingprice;
  // echo $_FILES['filex']['tmp_name'];
  if ($_FILES['filex']['name'] != null) {
    $image = $_FILES['filex']['name'];

    $path = "assets/img/product/";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $pname . '.' . $image_ext;

    $sqln = "UPDATE `product` SET `p_name`='$pname',`p_code`='$p_code',`cat_id`='$cat_id',`subcat_id`='$subcat_id',`b_id`='$brand',`unit`='$unit',`minimum_qty`='$minQuality',`p_desc`='$pdesc',`quantity`='$Quality',`discount`='$discount',`r_price`='$prealprice',`p_price`='$psellingprice',`pstatus`='$status',`p_image`='$filename' WHERE p_id='$p_id'";
    $sqlrn1 = mysqli_query($conn, $sqln);



    if ($sqlrn1) {
      move_uploaded_file($_FILES['filex']['tmp_name'], $path . '/' . $filename);
      $_SESSION['message'] = "product Successfully updated";

      header('Location:productlist.php');
    } else {
      $_SESSION['message'] = "product not updated";

      header('Location:productlist.php');
    }
  } else {

    $sqln = "UPDATE `product` SET `p_name`='$pname',`p_code`='$p_code',`cat_id`='$cat_id',`subcat_id`='$subcat_id',`b_id`='$brand',`unit`='$unit',`minimum_qty`='$minQuality',`p_desc`='$pdesc',`quantity`='$Quality',`discount`='$discount',`r_price`='$prealprice',`p_price`='$psellingprice',`pstatus`='$status' WHERE p_id='$p_id'";

    $sqlrn1 = mysqli_query($conn, $sqln);

    if ($sqlrn1) {
      $_SESSION['message'] = "product Successfully updated";

      header('Location:productlist.php');
    } else {
      $_SESSION['message'] = "product not updated";

      header('Location:productlist.php');
    }
  }
}


//delete product:-
if (isset($_POST['delete_p'])) {
  $p_id = mysqli_real_escape_string($conn, $_POST['delete_p']);

  $del = "DELETE FROM product WHERE p_id='$p_id'";
  $delrn = mysqli_query($conn, $del);

  if ($delrn) {
    $_SESSION['message'] = 'product deleted successfully';
    header("Location: productlist.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'product not deleted successfully';
    header("Location: productlist.php");
    exit(0);
  }
}


//------------------------------------------------------------brand code started-----------------------------------------------------------------

//add brand

if (isset($_POST['addbrand'])) {
  $bname = $_POST['bname'];



  $image = $_FILES['bfile']['name'];

  $path = "assets/img/brand/";


  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = $bname . '.' . $image_ext;

  $query = "INSERT INTO brand (b_name,b_img)
    VALUES ('$bname','$filename')";
  $run_q = mysqli_query($conn, $query);
  if ($run_q) {
    move_uploaded_file($_FILES['bfile']['tmp_name'], $path . '/' . $filename);
    $_SESSION['message'] = "brand Successfully added";

    header('Location:brandlist.php');
  } else {
    $_SESSION['message2'] = "all fields are required or brand already exists";

    header('Location:error505.php');
  }
}

//update brand code 

if (isset($_POST['update_bc'])) {
  $brand_id = mysqli_real_escape_string($conn, $_POST['bid']);

  $bname = $_POST['bname'];





  if ($_FILES['bfile']['name'] != null) {
    $image = $_FILES['bfile']['name'];

    $path = "assets/img/brand/";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $bname . '.' . $image_ext;


    $sqln = "UPDATE  brand SET  b_name='$bname',b_img='$filename' WHERE b_id='$brand_id'";

    $sqlrn = mysqli_query($conn, $sqln);

    if ($sqlrn) {
      move_uploaded_file($_FILES['bfile']['tmp_name'], $path . '/' . $filename);
      $_SESSION['message'] = "brand Successfully updated";

      header('Location: brandlist.php');
    } else {
      $_SESSION['message'] = "brand not updated";

      header('Location:brandlist.php');
    }
  } else {


    $sqln = "UPDATE  brand SET  b_name='$bname' WHERE b_id='$brand_id'";

    $sqlrn = mysqli_query($conn, $sqln);

    if ($sqlrn) {
      // move_uploaded_file($_FILES['filex']['tmp_name'],$path.'/'.$filename);
      $_SESSION['message'] = "brand Successfully updated";

      header('Location:brandlist.php');
    } else {
      $_SESSION['message'] = "brand not updated";

      header('Location:brandlist.php');
    }
  }
}

//delete brand 
if (isset($_POST['delete_b'])) {
  $brand_id = mysqli_real_escape_string($conn, $_POST['delete_b']);

  $del = "DELETE FROM brand WHERE b_id='$brand_id'";
  $delrn = mysqli_query($conn, $del);

  if ($delrn) {
    $_SESSION['message'] = 'brand deleted successfully';
    header("Location: brandlist.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'brand not deleted successfully';
    header("Location: brandlist.php");
    exit(0);
  }
}

//------------------------------------------------------------user-andmin add -----------------------------------------------------------------
if (isset($_POST['Submit'])) {
  $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
  $u_mail = mysqli_real_escape_string($conn, $_POST['u_mail']);
  $u_pass = mysqli_real_escape_string($conn, $_POST['u_pass']);
  $u_mobile = mysqli_real_escape_string($conn, $_POST['u_mobile']);
  $sel_role = mysqli_real_escape_string($conn, $_POST['sel_role']);

  $u_cpass = mysqli_real_escape_string($conn, $_POST['confirmpass']);

  $image = $_FILES['ufile']['name'];



  if ($u_pass == $u_cpass) {

    if ($sel_role == 'User') {
      $path = "assets/img/customer/";


      $image_ext = pathinfo($image, PATHINFO_EXTENSION);
      $filename = $u_mobile . '.' . $image_ext;
      $query = "INSERT INTO `login`( `u_name`, `u_mail`, `u_mobile`, `u_pass`,`u_img`) 
			 VALUES ('$u_name','$u_mail','$u_mobile','$u_pass','$filename')";

      $run_q = mysqli_query($conn, $query);

      if ($run_q) {
        move_uploaded_file($_FILES['ufile']['tmp_name'], $path . '/' . $filename);
        $_SESSION['message'] = "user successfully INserted";

        header('Location:userlists.php');
      } else {
        $_SESSION['message'] = "user does NOT INserted";

        header('Location:userlists.php');
      }
    } else {
      $path = "assets/img/profiles/";


      $image_ext = pathinfo($image, PATHINFO_EXTENSION);
      $filename = $u_mobile . '.' . $image_ext;
      $query =  "INSERT INTO `login`( `u_name`, `u_mail`, `u_mobile`, `u_pass`,`u_role`,`u_img`) 
      VALUES ('$u_name','$u_mail','$u_mobile','$u_pass','Admin','$filename')";

      $run_q = mysqli_query($conn, $query);

      if ($run_q) {
        move_uploaded_file($_FILES['ufile']['tmp_name'], $path . '/' . $filename);
        $_SESSION['message'] = "admin successfully INserted";

        header('Location:userlists.php');
      } else {
        $_SESSION['message'] = "admin does NOT INserted";

        header('Location:userlists.php');
      }
    }
  } else {
    $_SESSION['message'] = 'Please Enter Same Password In Both Field';
    header("Location: userlists.php");
    exit(0);
  }
}


//------------------------------------------admin update from profile:--------------------------


if (isset($_POST['edit_pro'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $u_mail = mysqli_real_escape_string($conn, $_POST['email']);
  $u_pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $u_mobile = mysqli_real_escape_string($conn, $_POST['phone']);

  echo $id . "<br>" . $name . "<br> <br>" . $u_pass . "<br>" . $u_mobile . "<br>";

  $image = $_FILES['ufile']['name'];
  echo $image;
  if ($u_mail != NULL) {
    $_SESSION['message2'] = "not change your email in profile";
    header('Location: error505.php');
  } else {


    if ($_FILES['ufile']['name'] != null) {
      $image = $_FILES['ufile']['name'];

      $path = "assets/img/profiles/";


      $image_ext = pathinfo($image, PATHINFO_EXTENSION);
      $filename = $u_mobile . '.' . $image_ext;


      $sqln = " UPDATE `login` SET `u_name`='$name',`u_mobile`='$u_mobile',`u_pass`='$u_pass',`u_img`='$filename' WHERE `u_id`='$id'";

      $sqlrn = mysqli_query($conn, $sqln);

      if ($sqlrn) {
        move_uploaded_file($_FILES['ufile']['tmp_name'], $path . '/' . $filename);
        $_SESSION['message'] = "your info successfully updated";

        header('Location: profile.php');
      } else {
        $_SESSION['message'] = "something went wrong";

        header('Location:profile.php');
      }
    } else {


      $sqln = "UPDATE `login` SET `u_name`='$name',`u_mobile`='$u_mobile',`u_pass`='$u_pass' WHERE `u_id`='$id'";

      $sqlrn = mysqli_query($conn, $sqln);

      if ($sqlrn) {
        $_SESSION['message'] = "your info successfully updated";

        header('Location:profile.php');
      } else {
        $_SESSION['message'] = "something went wrong";

        header('Location:profile.php');
      }
    }
  }
}

//-------------------------------------user update from profile----------------------------

if (isset($_POST['edit_pro12'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $u_name = mysqli_real_escape_string($conn, $_POST['name']);
  $u_mail = mysqli_real_escape_string($conn, $_POST['email']);
  $u_pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $u_mobile = mysqli_real_escape_string($conn, $_POST['phone']);

  echo $id . "<br>" . $u_name . "<br>" . $u_mail . "<br>" . $u_pass . "<br>" . $u_mobile;

  $image = $_FILES['ufile']['name'];

  if ($u_mail != NULL) {
    $_SESSION['message2'] = "not change your email in profile";
    header('Location: error5051.php');
  } else {


    if ($_FILES['ufile']['name'] != null) {
      $image = $_FILES['ufile']['name'];

      $path = "assets/img/customer/";
      $image_ext = pathinfo($image, PATHINFO_EXTENSION);
      $filename = $u_mobile . '.' . $image_ext;


      $sqln = " UPDATE `login` SET `u_name`='$u_name',`u_mobile`='$u_mobile',`u_pass`='$u_pass',`u_img`='$filename' WHERE `u_id`='$id'";

      $sqlrn = mysqli_query($conn, $sqln);

      if ($sqlrn) {
        move_uploaded_file($_FILES['ufile']['tmp_name'], $path . '/' . $filename);
        $_SESSION['message'] = "your info successfully updated";

        header('Location: profile1.php');
      } else {
        $_SESSION['message'] = "something went wrong";

        header('Location:profile1.php');
      }
    } else {


      $sqln = "UPDATE `login` SET `u_name`='$u_name',`u_mobile`='$u_mobile',`u_pass`='$u_pass' WHERE `u_id`='$id'";

      $sqlrn = mysqli_query($conn, $sqln);

      if ($sqlrn) {
        $_SESSION['message'] = "your info successfully updated";

        header('Location:profile1.php');
      } else {
        $_SESSION['message'] = "something went wrong";

        header('Location:profile1.php');
      }
    }
  }
}


//------------------------------------------------------signin page code --------------------------------------------------------------------
//user and admin login

if (isset($_POST['login_user'])) {

  $u_mail = mysqli_real_escape_string($conn, $_POST['email']);
  $u_pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $sel_role = mysqli_real_escape_string($conn, $_POST['sel_role']);

  // echo $u_mail ."<br>".$u_pass ."<br>".$sel_role;

  if ($sel_role == "User") {
    $_SESSION['email'] = $u_mail;
    $sel = "SELECT  `u_mail`, `u_pass` FROM `login` WHERE `u_mail`='$u_mail' AND`u_pass`='$u_pass' AND `u_role`='user'";

    $query = mysqli_query($conn, $sel);
    $row = mysqli_num_rows($query);
    //echo $row;
    if (mysqli_num_rows($query) > 0) {

      header("Location:pos.php");
      exit(0);
    } else {
      $_SESSION['message'] = 'WRONG PASSWORD OR USERNAME';
      header("Location: index.php");
      exit(0);
    }
  } else {
    $_SESSION['email'] = $u_mail;
    $sel = "SELECT  `u_mail`, `u_pass` FROM `login` WHERE `u_mail`='$u_mail' AND`u_pass`='$u_pass'AND `u_role`='Admin'";

    $query = mysqli_query($conn, $sel);
    $row = mysqli_num_rows($query);
    //echo $row;
    if (mysqli_num_rows($query) > 0) {

      header("Location:dashboard.php");
      exit(0);
    } else {
      $_SESSION['message'] = 'WRONG PASSWORD OR USERNAME';
      header("Location: index.php");
      exit(0);
    }
  }
}

//--------------------------------------------------------------sign-up page -------------------------------------------------------

if (isset($_POST['u_val'])) {
  echo "hi";
  $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
  $u_mail = mysqli_real_escape_string($conn, $_POST['u_mail']);
  $u_pass = mysqli_real_escape_string($conn, $_POST['u_pass']);
  $u_mobile = mysqli_real_escape_string($conn, $_POST['u_mobile']);

  //echo $u_name."<br>".$u_mail ."<br>".$u_pass ."<br>".$u_mobile;
  $sql1 = "SELECT  `u_mail` FROM `login` WHERE u_mail='$u_mail'";
  $query = mysqli_query($conn, $sql1);


  if (mysqli_num_rows($query) > 0) {
    $_SESSION['message'] = 'E-Mail is already used';
    header("Location: signup.php");
    exit(0);
  } else {
    $sql21 = "INSERT INTO `login`( `u_name`, `u_mail`, `u_mobile`, `u_pass`) 
  VALUES ('$u_name','$u_mail','$u_mobile','$u_pass')";
    $query = mysqli_query($conn, $sql21);
    if ($query) {
      $_SESSION['message'] = 'Successfully created account';
      // $_SESSION['mail']=$u_mail;
      header("Location:index.php");
      exit(0);
    }
  }
}

//-----------------------------------------------------------code for order product :-----------------------------------------------------------------  

if (isset($_POST['ordertoproduct'])) {
  $ref = $_POST['txtref'];
  $u_id = $_SESSION['userid'];
  $q = "SELECT * FROM `add_to_cart` WHERE `a_userid`=" . $u_id;

  $r = mysqli_query($conn, $q);
  if (mysqli_num_rows($r) > 0) {

    foreach ($r as  $value) {

      $u_id = $_SESSION['userid'];
      $price=$value['a_price'] *  $value['a_quantity'];

      $sql = "INSERT INTO `order_table`(`order_id`,`p_id` , `user_id`, `order_status`, `o_quantity` ,`order_total`)
       VALUES ('$ref','" . $value['product_id'] . "','$u_id','pending','" . $value['a_quantity'] . "',$price)";

      $run_q = mysqli_query($conn, $sql);
    }
     //delete product from add_to_cart table
     $dlsq = "DELETE FROM `add_to_cart` WHERE `a_userid`=$u_id";
     //  echo $sql;
     mysqli_query($conn, $dlsq);
 
  }

  if ($run_q) {

    $_SESSION['message'] = "thank you for order your order is pending in list ";
    header('Location:pos.php');
  } else {
    $_SESSION['message'] = "Something went wrong in this order";

    header('Location:code.php');
  }
}
// --------------------------------------clear the pending order ------------------------------------------------------------------------

if (isset($_POST['o1'])) {
  $id = $_POST['tid'];
  $pid = $_POST['pid'];
  $uid = $_POST['uid'];

  // update order table;
  $sqln = "UPDATE `order_table` SET `order_status`='ordered' WHERE `order_id`='$id' AND `p_id`=" . $pid;
  $sqlrn = mysqli_query($conn, $sqln);


  //change quantity of product 
  $sql = "SELECT `p_id`, `o_quantity` FROM `order_table` WHERE `p_id`=".$pid." AND user_id=".$uid ." AND `order_id`='$id' ";
  $corder=mysqli_query($conn,$sql);
  foreach ($corder as  $value1) {
   
     

   

    $updquery = "UPDATE `product` SET `quantity`=quantity-'".$value1['o_quantity'] . "' WHERE `p_id`=" . $value1['p_id'];
    $exequery = mysqli_query($conn, $updquery);
  }
 

  if ($sqlrn && $corder) {
   
    $_SESSION['message'] = "ordered done successfully";

    header('Location:dashboard.php');
  } else {
    $_SESSION['message'] = "something went wrong";

    header('Location:dashboard.php');
  }
}
//--------------------------------update qunatity-----------------------------------------------------------------------------
if (isset($_POST['v1'])) {
  $qty = $_POST['qty12'];
  echo $qty;
  $id = $_POST['txtv1'];
  echo $id;
  $sqln = "UPDATE `product` SET `quantity`='$qty' WHERE `p_id`='$id'";

  $sqlrn = mysqli_query($conn, $sqln);

  if ($sqlrn) {
    $_SESSION['message'] = "quantity  updated successfully";

    header('Location:dashboard.php');
  } else {
    $_SESSION['message'] = "something went wrong";

    header('Location:dashboard.php');
  }
}

//---------------------------------------------------delete user/admin --------------------------------------

if (isset($_POST['del_user'])) {
  $id = $_POST['del_user'];
  //echo $id;

  $sql = "DELETE FROM `login` WHERE u_id=" . $id . "AND u_role!='Admin' ";
  $sqlrn = mysqli_query($conn, $sql);

  if ($sqlrn) {
    $_SESSION['message'] = "user deleted successfully";

    header('Location:userlists.php');
  } else {
    $_SESSION['message'] = "something went wrong";

    header('Location:dashboard.php');
  }
}

//------------------------------------email verification code ---------------------------------------
if (isset($_POST['rcode213'])) {
  $scode = $_POST['pass'];
  $rcode = $_SESSION['rcode'];
  $sel_role = $_POST['sel_role'];
  $mail = $_SESSION['email'];
  //echo $scode . "<br>" . $rcode . "<br>" . $sel_role . "<br>" . $mail;
  if ($scode == $rcode) {


    if ($sel_role == "User") {



      $sel = "SELECT  `u_mail` FROM `login` WHERE `u_mail`='$mail'  AND `u_role`='user'";

      $query = mysqli_query($conn, $sel);
      $row = mysqli_num_rows($query);
      //echo $row;
      if (mysqli_num_rows($query) > 0) {
        $_SESSION['email'] = $mail;
        $_SESSION['message'] = "please change your password first";
        header("Location:pos.php");
        exit(0);
      } else {
        $_SESSION['message'] = 'Something wrong ,try againg';
        header("Location: index.php");
        exit(0);
      }
    } else {
      $mail = $_SESSION['email'];
      $sel = "SELECT  `u_mail` FROM `login` WHERE `u_mail`='$mail' AND `u_role`='Admin'";

      $query = mysqli_query($conn, $sel);
      $row = mysqli_num_rows($query);
      //echo $row;
      if (mysqli_num_rows($query) > 0) {
        $_SESSION['email'] = $mail;
        $_SESSION['message'] = "please change your password first";
        header("Location:dashboard.php");
        exit(0);
      } else {
        $_SESSION['message'] = 'Something wrong ,try againg';
        header("Location: index.php");
        exit(0);
      }
    }
  } else {
   $_SESSION['message'] = 'Code is not wrong so try again';
        header("Location: index.php");
        exit(0);
  }
}

//-----------------delete product from add-to-cart table --------------------------------
if (isset($_POST['cc'])) {

  $tmm = $_SESSION['userid'];
  $sql = "DELETE FROM `add_to_cart` WHERE `a_userid`=$tmm AND `product_id`='" . $_POST['cc'] . "'";
  echo $sql;
  if ($a1 = mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'Product remove successfully from cart';
    header("Location: pos.php");
    exit(0);
    unset($_SESSION['cart'][$key]);
  } else {
    $_SESSION['message'] = 'Something wrong ,try againg';
    header("Location: pos.php");
    exit(0);
  }
}
//-------------------delete the all add-to-cart product ---------------------------------------
if (isset($_POST['clearall12'])) {
  $tmm = $_POST['clearall12'];
  $sql = "DELETE FROM `add_to_cart` WHERE `a_userid`=$tmm ";
  echo $sql;
  if ($a1 = mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'cart will be empty';
    header("Location: pos.php");
    exit(0);
  } else {
    $_SESSION['message'] = 'Something wrong ,try againg';
    header("Location: pos.php");
    exit(0);
  }
}
