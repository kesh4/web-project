<html>
    <head> 
        <title> Driver Registrationegistration </title>
        <link rel = "stylesheet" type = "text/css" href="css/driverRegister.css"> 
        <link rel="stylesheet" href="css/layout.css">
    </head>

    <body class="body">
        <div class="topnav">
            <ul class="nav-ul">
                <a target="_blank" href="">
                    <img  src="images/xrlogo150x.png" alt="Cinque Terre">
                </a>
                <li><a class="active" href="#">Home</a></li>

                <li><a href="aboutPage.html">About</a></li>

            </ul>
        </div>
        <center ><span   style="font-size: 70px; color: aliceblue"> Driver Registration</span></center>
        <?php
        include ("php/connect.php");
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idDriver =$_POST['username'];
            $FName =$_POST['FName'];
            $LName =$_POST['LName'];
            $NIC =$_POST['NIC'];
            $email =$_POST['email'];
            $phoneNo =$_POST['phoneNo'];
            $password =$_POST["password"];
            $VehicleNo =$_POST["VehicleNo"];
            $type =$_POST["type"];
            $VehicleBrand =$_POST["VehicleBrand"];
            $VehicleModel =$_POST["VehicleModel"];
            $ManufacturedYear =$_POST["ManufacturedYear"];
            $ownerName =$_POST["ownerName"];

            if (empty($idDriver) or empty($FName) or empty($LName) or empty($NIC) or empty($email) or empty($phoneNo) or empty($password)
            or empty($VehicleNo) or empty($type) or empty($VehicleBrand) or empty($VehicleModel) or empty($ManufacturedYear) or empty($ownerName) )
            {
                echo "<p>Please ensure all mandatory fields are filled in!";
            }
            else
            {
                //write SQL query
                $addDriver=
                "insert into 
                driver 
                values ('".$idDriver."', '".$FName."', '".$LName."', '".$NIC."', '".$email."', ".$phoneNo.", '".$password."',NULL ,NULL ,0 )";
                //run SQL query
                $exeaddDriver =mysqli_query($conn,$addDriver);

                $addVehicle=
                "insert into 
                vehicle 
                values ('".$VehicleNo."', '".$type."', '".$VehicleBrand."', '".$VehicleModel."', '".$ManufacturedYear."', '".$ownerName."', '".$idDriver."')";

                $exeaddVehicle = mysqli_query($conn,$addVehicle);

                //if error code is 0 then display confirmation message
                if (mysqli_errno($conn)==0)
                { 
                    header("Location: http://localhost/finalized1/login.html");
                }
                //else check individual error codes and display appropriate message
                else
                {
                    echo "<p>There is an error with the Driver you entered.";
                }
            }
        }
    
        if(isset($_POST['signout'])) { 
            echo "<p>signout pressed";
            session_unset();
            session_destroy();
            header("Location: http://localhost/webFinal/login.html");
        } 
        ?>

        <div class="box2">

            <form method="POST" action="">
                <table class="tb" height="450px" width="480px" border="0">
                    <tr>
                        <th colspan="2" height="70px" style="font-size: 28px;"> Driver Registration</th>
                    </tr>
                    <tr>
                        <td height="40px"> <center>
                        <input type="text" name="FName" size="21px" placeholder="First Name"> 
                        <input type="text" name="LName" size="21px" placeholder="Last Name"></center> 
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px" ><center><input type="text" name="username" size="50px" placeholder="Username"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="password" name="password" size="50px" placeholder="Enter Password"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="password" name="rePassword" size="50px" placeholder="Re-Enter Password"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="text" name="NIC" size="50px" placeholder="N.I.C No."></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="text" name="phoneNo" size="50px" placeholder="Mobile No."></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input class="lastRow" type="text" name="email" size="50px" placeholder="E-mail"></center></td>
                    </tr>
                    <!-- <tr> 
                        <td colspan="2"><center><input type="Submit" value="Submit" ></center></td>
                    </tr> -->
                </table>
            <!-- </form> -->
        </div>
        <div class="box3">
            <!-- <form action="POST" method=""> -->
                <table class="tb" height="450px" width="480px" border="0">
                    <tr>
                        <th colspan="2" height="70px" style="font-size: 28px;">Vehicle Details</th>
                    </tr>
                    <tr>
                        <td height="40px"> <center>
                        <input list="Vehicles" name="type" size="21px" placeholder="Type of the Vehicle"> 
                        <datalist id="Vehicles">
                            <option value="Bike">
                            <option value="Tuk">
                            <option value="Mini Cab">
                            <option value="Car">
                            <option value="Van">
                        </datalist>
                        <input type="text" name="ownerName" size="21px" placeholder="Vehicle owner's name"></center> 
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px" ><center><input type="text" name="VehicleNo" size="50px" placeholder="Vehicle No"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="text" name="VehicleModel" size="50px" placeholder="Vehicle Model"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="text" name="VehicleBrand" size="50px" placeholder="Vehicle Brand"></center></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="40px"><center> <input type="text" name="ManufacturedYear" size="50px" placeholder="Vehicle Manufacturing Year"></center></td>
                    </tr>
                    <tr> 
                        <td colspan="2"><center><input type="Submit" value="Submit" ></center></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>