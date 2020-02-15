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
              <h1> Vinod Sharma</h1>
              <h2> 0711231245</h2>
              <h3> colombo</h3>
              <h4>**********</h4>
            </div>
          </div>
        </div>
    </div>
    
    <br>

</body>
</html>
	

