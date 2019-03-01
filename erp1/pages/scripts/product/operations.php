<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/erp1/pages/includes/functions.php");
//require_once("../../includes/functions.php");
function getAllSupplierForSelect(){
    global $connection;
    $query = "SELECT * FROM supplier WHERE deleted = 0";
    $result = mysqli_query($connection,$query);
    checkQueryResult($result);
    while($row = mysqli_fetch_assoc($result)){
        $supplier_id = $row['supplier_id'];
        $supplier_name = $row['supplier_name'];
        echo "<option value='$supplier_id'>$supplier_name</option>";
    }
}
?>