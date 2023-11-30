<?php
session_start();
include('dbcon.php');

if (isset($_POST['action'])) {
  if ($_POST['action'] = "Remove") {
  //  echo "welcome"; 

    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['id'] == $_POST['id']) {
        unset($_SESSION['cart'][$key]);
        echo "1";
      }
    }
  }
  if ($_POST['action'] = "Remove1") {
    //  echo "welcome"; 
    
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $_POST['id']) {

          unset($_SESSION['cart'][$key]);
          echo "1";
        }
      }
    }
}
if (isset($_POST['action1'])) {
  if ($_POST['action1'] == "clear") {
    unset($_SESSION['cart']);
    echo "1";
  } else {
    echo "0";
  }

}
