<?php
require_once("../../includes/functions.php");
session_start();
$employee_id = $_SESSION['employee_id'];


/*********************************************
code to upload image using files
********************************/
//$image_name = $_FILES['product_image']['name'];
//$image_size = $_FILES['product_image']['size'];
//$temp_name = $_FILES['product_image']['tmp_name'];
//$file_type = $_FILES['product_image']['type'];
//
//$file_extension = strtolower(end(explode(".",$image_name)));
//echo "Image name : ".$image_name;
//echo "<br> Image Size: $image_size";
//echo "<br> Temp name : $temp_name";
//echo "<br> File extension : $file_extension";
//
//$valid_extensions = array("jpeg","jpg","png");
//
//if(in_array($file_extension,$valid_extensions)==false){
//    $error_msg[]= "Image is not valid, Please enter a JPEG or JPG or PNG file!";
//}
//
//if($image_size>2097152){
//    $error_msg[]= "Image size not valid, Please enter a image below 2MB size";
//}
////empty func is used to find in array
//if(empty($error_msg)){
//    move_uploaded_file($temp_name,"../../../assets/products/images/.$image_name");
//    echo "File uploaded successfully";
//}else{
//    print_r($error_msg);
//}
/*********************************************
code to upload image using files
********************************/



if(isset($_POST['add_product'])){
    
    //checking whether the file was uploaded or not!
    if(isset($_FILES['product_image'])){
        //yes the file was uploaded so we are initializing all the required variables
        //do all the variables validaions later
        $image_name = $_FILES['product_image']['name'];
        $image_size = $_FILES['product_image']['size'];
        $temp_name = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
        
        $file_extension = strtolower(end(explode(".",$image_name)));
    }    
    
    $product_name=$_POST['product_name'];
    $category_id=$_POST['category_id'];
    $rate_of_sale = $_POST['rate_of_sale'];
    $additonal_specification = $_POST['additonal_specification'];
    $eoq = $_POST['eoq'];
    $suppliers = $_POST['supplier_id'];
    
    
    $tablename = "product";
    $columns = "product_name , eoq, additional_specification, category_id, image_extension ,created_by";
    $values ="'$product_name', $eoq, '$additonal_specification',$category_id, '$file_extension', $employee_id";
    
    
    $result= insert($tablename,$columns,$values);
    
    $product_id = mysqli_insert_id($connection);
    //returns the last id added whenit is autoincrement
    
    $tablename="product_sale_rate";
    $columns = "product_id, rate_of_sale, wef, created_by";
    $values = "$product_id,$rate_of_sale,now(),$employee_id";
    $result = insert($tablename, $columns, $values);
    
    $tablename="product_supplier";
    $columns = "product_id, supplier_id";
    foreach($suppliers as $supplier_id){
        $values = "$product_id, $supplier_id";
        $result = insert($tablename, $columns, $values);
    }
    
    
    
    /*
    code to upload the file!
    */
    if(isset($_FILES['product_image'])){
        move_uploaded_file($temp_name, "../../../assets/products/images/".$product_id.".".$file_extension);
    }
    
//    $_SESSION['status'] = CUSTOMER_ADD_SUCCESS;
    
//    
//    echo $product_name." ".$category_id." ".$rate_of_sale;
//    
//    foreach($_POST['supplier_id'] as $element)
//        echo $element." ";
//    
//    $result = mysqli_query($connection,$query);
//
    
}

?>