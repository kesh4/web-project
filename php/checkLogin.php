<?php
include ("connect.php");

$pagename="Cab Service | Login";
echo "<title>".$pagename."</title>";
//echo "<h2>".$pagename."</h2>";

$username =$_POST['username'];
$password =$_POST['password'];

//write JOIN SQL query
$viewCusSQL="select idCustomer from customer where idCustomer='".$username."' AND password = '".$password."'";

$exeViewCusSQL=mysqli_query($conn, $viewCusSQL) or die (mysqli_error());

if(mysqli_num_rows($exeViewCusSQL)<=0){
    $viewDriverSQL="select idDriver from driver where idDriver ='".$username."' AND password = '".$password."'";
    
    $exeViewDriverSQL=mysqli_query($conn, $viewDriverSQL) or die (mysqli_error());
    
    if(mysqli_num_rows($exeViewDriverSQL)<=0){
        echo "<body>";
        echo "<p>Have entered wrong username or password";
        echo "</body>";
    }else{
        session_start();
        if($_SESSION["userType"]==NULL){
            $_SESSION["userType"]="driver";
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
        }
        header("Location: http://localhost/finalized1/driverProfile.php");
    }
}else{
    session_start();
    if($_SESSION["userType"]==NULL){
        $_SESSION["userType"]="customer";
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
    }
    header("Location: http://localhost/finalized1/CusCabRequest.php");
}



//echo "<body>";
//echo "<hr><b>".date('d F Y H:i:s')."</b>";
//echo "<hr>";
//
//
//
////Run SQL query or exit if any errors are retrieved
//
////Create an array of records and fecth the results of the execution of the SQL query
////Loop through the array of records and display details in specific format
//while ($arraydepts=mysqli_fetch_array($exeviewdeptsSQL))
////{
////	echo "<p>Dept Id: ".$arraydepts['department_id']." - ".$arraydepts['department_name'];
////	echo "<br>".$arraydepts['street_address'].", ".$arraydepts['city']." ".$arraydepts['postal_code'];
////	echo "<hr>";
////}
//	
//echo "</body>";
?>