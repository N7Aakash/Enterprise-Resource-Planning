<?php

require_once("includes/functions.php");
require_once("includes/status-constants.php");





$user_id =2;
$student_first_name = array("chirag", "dhiren", "jatin", "rahul", "narang","sumai", "akshay", "shyam", "nikhil", "varun", "dhiraj", "karan", "roshni", "khushboo", "latika","anisha");

$student_middle_name = array("prakash","rajesh","ashok","puran","karan","sunil","gaithode","jagu","hiro","girish","girishlal","sunil","mukesh","rakesh","piyush","sumit");

$student_last_name = array("narang","raghani","punjabi","kanjan","sumai","thakkar","sadhwani","janyani","gurnani","mulhandani","jangra","nawani","agarwal","bansal","dare","bansode");

$student_number = array("283461894","8468126491","714832468","47162466","562356922","988462873","9748858275","859773456","9875627648","8637958275","935783295","99635295954","98826471","89378429","7481349522","94825921");

$student_department_id = array("1","2","3","4","5");
$student_gender="Male";
$staff_dob = array("03/27/1998", "04/21/1998", "10/12/1998", "04/03/1998", "09/17/1998", "03/27/1998", "04/21/1998", "10/12/1998", "04/03/1998", "09/17/1998", "03/27/1998", "04/21/1998", "10/12/1998", "04/03/1998", "09/17/1998");
$student_passout = "2020";



for($i=0;$i<16;$i++){
    $j=$i%4;
    $time = strtotime($staff_dob[$i]);
    $dob = date('Y/m/d', $time);
    $query = "INSERT INTO student (user_id,student_first_name,student_middle_name,student_last_name,student_number,student_dept_id,student_gender,student_dob,student_passout_year,created_at) VALUES($user_id,'$student_first_name[$i]','$student_middle_name[$i]','$student_last_name[$i]','$student_number[$i]',$student_department_id[$j],'$student_gender','$dob','$student_passout',now())";
    $user_id++;
    echo $query;

    $result= mysqli_query($connection,$query);
    checkQueryResult($result);
}

?>

