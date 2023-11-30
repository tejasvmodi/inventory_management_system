<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
  
    $query = "SELECT * FROM sub_cat where cat_id ='" . $_POST['category_id'] . "' order by sub_name asc";
    $result = $db_handle->runQuery($query);
?>
    <option value disabled selected>Selected Sub-Category</option>

    <?php
    foreach ($result as $state) {
    ?>
        <option value="<?php echo $state["sub_id"]; ?>"><?php echo $state["sub_name"]; ?></option>
<?php
    }
?>