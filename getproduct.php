<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(! empty($_POST['subcat_id'])){
    $query = "SELECT * FROM product where subcat_id  ='".$_POST['subcat_id']."' order by p_name asc";
    $result = $db_handle->runQuery($query);
     ?>
     <option value disabled selected>Selected State</option>

     <?php
    foreach($result as $state){
    ?>
    <option value="<?php echo$state["p_id"];?>" ><?php echo $state["p_name"]; ?></option>
    <?php
}
}
?>