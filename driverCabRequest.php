<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">

    <title>Cab Service | Driver </title>
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/imagegallery.css">
    <link rel="stylesheet" href="css/sideNavigation.css">
<!--    <link rel="stylesheet" href="css/feedbackPopup.css">-->
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
<!--
            <li><a href="#">Try our Quiz</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Site Map</a></li>             
-->
            <li><a href="aboutPage.html">About</a></li>
<!--            <input type="text" placeholder="Search Store..">-->
        </ul>
    </div>
    
    <div class=navigation>
        <ul class="nav-ul">
            <li class=navElement><a href="driverProfile.php">Profile</a></li>
            
            <li class=navElement><a href="driverCabRequest.php">Cab Requests</a></li>
        </ul>
    </div>
    

    <div class="container">
        <?php
            include ("php/connect.php");
            
            $viewSQL="select idRide, startingAddress, destinationAddress, date, time
			from ride 
            where rideTaken='no'";

            //Run SQL query or exit if any errors are retrieved
            $exeviewSQL=mysqli_query($conn,$viewSQL) or die (mysqli_error());

            //Create an array of records and fecth the results of the execution of the SQL query
            //Loop through the array of records and display details in specific format
            while ($array=mysqli_fetch_array($exeviewSQL))
            {
                echo "<div class='containerElement'>";
                    //echo "<div class='left'>";
                    echo "From : ".$array['startingAddress']."<br/>";
                    echo "To &nbsp;&nbsp;&nbsp;&nbsp;: ".$array['destinationAddress']."<br/>";
                    echo "Date : ".$array['date']."<br/>";
                    echo "Time : ".$array['time']."<br/>";
                    //echo "</div>";
                    echo "<form method='POST'><input type='submit' value='Take Ride' name='takeRide'></form>";
                echo "</div>";
                
                if(isset($_POST['takeRide'])) { 
                    $updateSQL= "update ride 
                        SET rideTaken = 'yes'
                        WHERE idRide = '".$array['idRide']."'";
                    $exeviewSQL=mysqli_query($conn,$updateSQL) or die (mysqli_error());
                    header("Location: http://localhost/webFinal/driverCabRequest.php");
                }
            }
        
        
        ?>
        <!-- <div class="containerElement">
            From : noooooooooooooooooooooo<br/>
            To &nbsp;&nbsp;&nbsp;&nbsp;: noooooooooooooooooooooo<br/>
            Date : noooooooooooooooooooooo<br/>
            Time : noooooooooooooooooooooo<br/>
        </div> -->
    </div>
    
    <br>
    
    <footer class="footer-nav"> 
        <h5><font color="white">
        Copyright &copy; <span class="tm-current-year">2020</span> Web Coursework </font>
        </h5>
    </footer>
    <script src="js/slideshow.js"></script>
    <script src="js/feedbackPopup.js"></script>
</body>
</html>
	
