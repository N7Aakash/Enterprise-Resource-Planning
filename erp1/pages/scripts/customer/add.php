<?php
session_start();
require_once("../../includes/db.php");
require_once("../../includes/functions.php");
$employee_id=$_SESSION['employee_id'];

if(isset($_POST['add_customer'])){
    $customer_name =$_POST['customer_name'];
    $customer_address =$_POST['customer_address'];
    $customer_email =$_POST['customer_email'];
    $customer_contact =$_POST['customer_contact'];
    $gst_no=$_POST['gst_no'];
    
    $query = "SELECT * FROM customer WHERE customer_contact=$customer_contact AND deleted=0";
    $result = mysqli_query($connection,$query);
    checkQueryResult($result);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['status'] = ERROR_INVALID;
//        $tp=$_SESSION['status'];
//        echo $tp;
    }
    else{
        $query= "INSERT into customer(customer_name,customer_address,customer_email,customer_contact,gst_no,created_at,created_by) VALUES('$customer_name','$customer_address','$customer_email','$customer_contact','$gst_no',now(),$employee_id)";
        $result = mysqli_query($connection,$query);
        checkQueryResult($result);
        
    }

}
$url="http://".BASE_SERVER."/erp1/pages/add-customer.php";
redirect($url);


?>