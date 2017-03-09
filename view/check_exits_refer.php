<?php
$db_username = 'root';
$db_password = '';
$db_name = 'huynd006';
$db_host = 'localhost';
################
 
//check we have username post var
if(isset($_POST["username"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }  
 
        //try connect to db
    $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
 
    //trim and lowercase username
    $username =  strtolower(trim($_POST["username"]));
 
    //sanitize username
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
 
    //check username in db
    $results1 = mysqli_query($connecDB,"SELECT id FROM tbl_acc WHERE username='$username'");
    $results2 = mysqli_query($connecDB,"SELECT id FROM tbl_acc WHERE email='$username'");
 
    //return total count
    $username_exist1 = mysqli_num_rows($results1); //total records
 $username_exist2 = mysqli_num_rows($results2);
     $true=true;
    $false=false;
    if($username_exist1||$username_exist2) {
        echo "1";
    }else{
        // echo "<i class='fa fa-check'> </i>";
        echo "0";
    }
 
    //close db connection
    mysqli_close($connecDB);
}

?>