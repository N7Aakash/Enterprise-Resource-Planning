<?php
require_once("../../includes/functions.php");
//require_once("C:\xampp\htdocs\erp1\pages\includes\functions.php");
session_start();
$employee_id=$_SESSION['employee_id'];
if(isset($_POST['deleteBtn'])){
    $product_id = $_POST['product_id'];
//    $query = "UPDATE product SET deleted = 1, deleted_at=now(), deleted_by = $employee_id WHERE product_id = $product_id";
    $tableName = "product";
    $primaryKeyColumnName = "product_id";
    
    deleteRecord($tableName,$primaryKeyColumnName,$product_id,$employee_id);
    $tableName = "product_sale_rate";
    deleteRecord($tableName,$primaryKeyColumnName,$product_id,$employee_id);
    
    
//    mysqli_query($connection,$query);
    
    $url="http://".BASE_SERVER."/erp1/pages/manage-product.php";
    redirect($url);
}
?>