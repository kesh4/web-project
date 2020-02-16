<html>
    <head> 
        <title> customer registration </title>
        <link rel = "stylesheet" type = "text/css" href="css/css.css"> 
        <link rel="stylesheet" href="css/layout.css">
    </head>

    <body class="body">
    
    <?php
        include ("php/connect.php");
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idCustomer =$_POST['username'];
            $FName =$_POST['FName'];
            $LName =$_POST['LName'];
            $NIC =$_POST['NIC'];
            $email =$_POST['email'];
            $phoneNo =$_POST['phoneNo'];
            $password =$_POST["password"];

            if (empty($idCustomer) or empty($FName) or empty($LName) or empty($NIC) or empty($email) or empty($phoneNo) or empty($password))
            {
                echo "<p>Please ensure all mandatory fields are filled in!";
            }
            else
            {
                //write SQL query
                $addCustomer=
                "insert into 
                customer 
                values ('".$idCustomer."', '".$FName."', '".$LName."', '".$NIC."', '".$email."', ".$phoneNo.", '".$password."')";
                //run SQL query
                $exeaddCustomer=mysqli_query($conn,$addCustomer);

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
              <img  src="images/xrlogo150x.png" alt="Cinque Terre">
            </a>
            <li><a class="active" href="#">Home</a></li>

            <li><a href="aboutPage.html">About</a></li>

        </ul>
    </div> 
  
        
        
        <div class="box2">
            
            <form action="" method="POST">
                <table class="tb" height="450px" width="480px" border="0">
                        <tr>
                            <th colspan="2" height="70px" style="font-size: 28px;"> Customer Registration</th>
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
                            <td colspan="2" height="40px"><center> <input type="password" name="password" size="50px" placeholder=" Enter Password"></center></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="40px"><center> <input type="password" name="re_password" size="50px" placeholder=" Re-Enter Password"></center></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="40px"><center> <input type="text" name="NIC" size="50px" placeholder=" Enter N.I.C"></center></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="40px"><center> <input type="text" name="phoneNo" size="50px" placeholder="Mobile Number"></center></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="40px"><center> <input type="text" name="email" size="50px" placeholder=" Email Address"></center></td>
                        </tr>
                        <tr> 
                            <td colspan="2"><center><input type="submit" value="Sign up" ></center></td>
                        </tr>
                </table>
            </form>
        </div>
        
        
        <div style="position: absolute; margin-top:200px; margin-left: 50%; font-size: 35px; color: white">
            <p> <b style="font-size:100px"> Safe..</b> <br />24 Hours Fast Service<br  /> </p>
        </div>
    </body>
</html>