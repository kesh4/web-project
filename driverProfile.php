<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">

    <title>Cab Service | Driver </title>
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/sideNavigation.css">
    <link rel="stylesheet" type="text/css" href="css/driverProfile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>

<body>
    <?php
      if($_SESSION["userType"]!="driver"){
        header("Location: http://localhost/finalized1/login.html");
      }

      if(isset($_POST['signout'])) { 
        echo "<p>signout pressed";
        session_unset();
        session_destroy();
        header("Location: http://localhost/finalized1/login.html");
      } 

      $_SESSION["userType"]
    ?>
    
    <div class="topnav">
        <ul class="nav-ul">
            <a target="_blank" href="">
              <img src="images/xrlogo150x.png" alt="Cinque Terre">
            </a>
            <li><a class="active" href="#">Home</a></li>

            <li><a href="aboutPage.html">About</a></li>
            <form method="post">
                <input type="submit" value="Signout" name="signout">
            </form>
        </ul>
    </div>

    <div class=navigation>
        <ul class="nav-ul">
            <li class=navElement><a href="driverProfile.php">Profile</a></li>
            <li class=navElement><a href="driverCabRequest.php">Cab Requests</a></li>
        </ul>
    </div>


    <div class="container">
        <div class="body">
          <div class="profile">
            <img class=img src="images/driver.jpg" >
            <div class="profiletext">
              <?php
                include ("php/connect.php");
            
                $viewSQL="select FName, LName, email, phoneNo, rating
                from driver 
                where idDriver='".$_SESSION["username"]."'";
    
                //Run SQL query or exit if any errors are retrieved
                $exeviewSQL=mysqli_query($conn,$viewSQL) or die (mysqli_error($conn));
    
                //Create an array of records and fecth the results of the execution of the SQL query
                //Loop through the array of records and display details in specific format
                $array=mysqli_fetch_array($exeviewSQL);

                  echo "<h1>".$array['FName']." ".$array['LName']."</h1>";
                  echo "<h2>".$array['phoneNo']."</h2>";
                  echo "<h3>".$array['email']."</h3>";
                  echo "<h4>".$array['rating']."</h4>";
                
              ?>
            </div>
          </div>
        </div>
    </div>
    
    <br>

</body>
</html>
	

