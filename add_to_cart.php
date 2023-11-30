<?php
 session_start();

 if(isset($_SESSION['cart']))
 {
   //echo "yes";
    $cart_id= array_column($_SESSION['cart'],"id");
   
    if(!in_array($_POST["id"],$_SESSION['cart']))
    {
      echo $_POST['id'];
      
        $item_array=array(
            "id" => $_POST['id'],
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity'],
            "image" =>  $_POST['image'],
            "rprice" =>$_POST['rprice']
        );  
        $_SESSION['cart'][]=$item_array;
    }

    
 }
else{
    //echo "hello";
    $item_array=array(
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity'],
        "image" => $_POST['image'],
        "rprice" =>$_POST['rprice']
    );

    $_SESSION['cart'][]=$item_array;
 }
?>