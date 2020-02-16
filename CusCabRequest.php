<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">

    <title>Cab Service | Customer </title>
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
        
        if($_SESSION["userType"]!="customer"){
            header("Location: http://localhost/finalized1/login.html");
        }
    
        include ("php/connect.php");
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idRide = uniqid();
            $currAddress =$_POST['currAddress'];
            $desAddress =$_POST['desAddress'];
            $date =$_POST['date'];
            $time =$_POST['time'];
            $idCustomer =$_SESSION["username"];

            if (empty($currAddress) or empty($desAddress) or empty($date) or empty($time))
            {
                echo "<p>Please ensure all mandatory fields are filled in!";
            }
            else
            {
                //write SQL query
                $addRide=
                "insert into 
                ride 
                values ('".$idRide."', '".$currAddress."', '".$desAddress."', '".$date."', '".$time."', 'no', '".$idCustomer."', NULL,NULL)";
                //run SQL query
                $exeaddRide=mysqli_query($conn,$addRide);

                //check error code and error message, can be commented out later
                //echo "<p>Error code: ".mysql_errno($conn);
                //echo "<br>Error msg: ".mysql_error($conn);

                //if error code is 0 then display confirmation message
                if (mysqli_errno($conn)==0)
                { 
                    header("Location: http://localhost/finalized1/login.html");
                }
                //else check individual error codes and display appropriate message
                else
                {
                    echo "<p>There is an error with the department you entered.";
                    //error code for breach of PK or unique constraint
                    if (mysqli_errno($conn)==1062)
                    {
                        echo "<br>The value entered for the new department id or department name is not valid as it is already used.";
                    }
                    //error code for breach of FK constraint
                    if (mysqli_errno($conn)==1452)
                    {
                        echo "<br>The value entered for the new location id is not valid 
                        as it is does not reference an existing value.";
                    }

                    //error code for inserting values that is not a valid number in location id
                    if (mysqli_errno($conn)==1054)
                    {
                        echo "<br>Value entered for the location id is not valid.";			
                    }

                    //error code for inserting character that is problematic for SQL query
                    if (mysqli_errno($conn)==1064)
                    {
                        echo "<br>Values entered for the department details are not valid.";			
                    }

                }
            }
        }
    
        if(isset($_POST['signout'])) { 
            echo "<p>signout pressed";
            session_unset();
            session_destroy();
            header("Location: http://localhost/webFinal/login.html");
        } 
    
//        function signout(){
//            echo "<p>signout pressed";
//            session_unset();
//            session_destroy();
//            header("Location: http://localhost/webFinal/login.html");
//        }
    
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
            <li class=navElement><a href="CusCabRequest.php">Cab Request</a></li>
            <li class=navElement><a href="CusHistory.php">Ride Hsitory</a></li>
        </ul>
    </div>
    
<!--    <div class=content>-->
   <div class="container">
            <form method="POST" action="">
                <label for="fname">Current Address</label><br>
                <input type="text" id="fname" name="currAddress" placeholder="Enter address you want the cab to come......... "><br>

                <label for="lname">Destination Address</label><br>
                <input type="text" id="email" name="desAddress" placeholder="Enter address of where you want to go........ "><br>

<!--
                <label for="rate">How would you rate this website ?</label><br><br>

                <input id="rdbtn1" type="radio" name="rateus" value="poor" checked> Poor
                <input id="rdbtn2" type="radio" name="rateus" value="good"> Good
                <input id="rdbtn3" type="radio" name="rateus" value="excellent"> Excellent <br> <br>
-->
                <label for="lname">Date </label><br>
                <input type="date" id="email" name="date" placeholder="Enter date to cab to come........"><br>
                
                <label for="lname">Time </label><br>
                <input type="time" id="email" name="time" placeholder="Enter date to cab to come........"><br>


<!--
                <label for="subject">Comment</label><br>
                <textarea id="comment" name="comment" placeholder="Write something.." style="height:200px"></textarea><br>
                 Trigger/Open The Modal 
-->
                <input id="myBtn" type="submit" value="Request">
                    <!-- The Modal -->
<!--
                    <div id="myModal" class="modal">
                     Modal content 
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2>We appreciate you for taking time to give us a feedback :) </h2>
                            </div>
                            <div class="modal-body"> 
                                <p>"Dear John, Thank you very much for your feedback. You have rated our site as Good and your comment was Very informative website."</p>
                            </div>
                        </div>
                    </div>         
-->
            </form>
        </div>
<!--    </div>-->
    
    <br>
    
    <footer class="footer-nav"> 
        <h5><font color="white">
<!--            Copyright &copy; <span class="tm-current-year">2020</span> Web Coursework -->
                2020 prime cab. all right reserved
            </font>
        </h5>
    </footer>
    <script src="js/slideshow.js"></script>
    <script src="js/feedbackPopup.js"></script>
</body>
</html>
	
