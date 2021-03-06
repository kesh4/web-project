<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">

    <title>Cab Service | Customer </title>

    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/sideNavigation.css">
    
    <link rel="stylesheet" type="text/css" href="css/driverProfile.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>

<body>
    
    <div class="topnav">
        <ul class="nav-ul">
            <a target="_blank" href="">
              <img src="images/xrlogo150x.png" alt="Cinque Terre">
            </a>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="aboutPage.html">About</a></li>
        </ul>
    </div>
    
    <div class=navigation>
        <ul class="nav-ul">
            <li class=navElement><a href="CusCabRequest.html">Cab Request</a></li>
            <li class=navElement><a href="CusHistory.html">Ride Hsitory</a></li>
        </ul>
    </div>
    

    <div class="container">

        <div class="profileDetail">
            <img class=img src="images/driver.jpg" >
            <div class="profiletextDetail">
              <h1> Vinod Sharma</h1>
              <h2> 0711231245</h2>
              <h3> colombo</h3>
              <h4>**********</h4>
            </div>
        </div>

        <div class="rating">
            <form method="" action="">
                <label for="fname">Comment</label><br />
                <input type="text" id="fname" name="fullname" placeholder="Enter address you want the cab to come......... "><br />
                
                <label for="rate">How would you rate this Driver ?</label><br /><br />

                <input id="rdbtn1" type="radio" name="rateus" value="poor" checked> 1 &nbsp;
                <input id="rdbtn2" type="radio" name="rateus" value="good"> 2 &nbsp;
                <input id="rdbtn3" type="radio" name="rateus" value="excellent"> 3 &nbsp;
                <input id="rdbtn4" type="radio" name="rateus" value="excellent"> 4 &nbsp;
                <input id="rdbtn5" type="radio" name="rateus" value="excellent"> 5 &nbsp;<br /> <br />
                
                <input id="myBtn" type="submit" value="Done" onclick="updateTxt()">

            </form>
        </div>
        
        <div class="ratingView">
            <span>Ratings of the Driver</span><br /><br />
            <span>5  : </span>  <span>No </span><br />
            <span>4  : </span>  <span>No </span><br />
            <span>3  : </span>  <span>No </span><br />
            <span>2  : </span>  <span>No </span><br />
            <span>1  : </span>  <span>No </span><br />
                
        </div>
    </div>
    
    
       
    <br>


</body>
</html>
	
