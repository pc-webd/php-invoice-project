<?php
   session_start();
?>
       
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   
    <style>
        body
        {
            margin: 0;
            padding: 0;
            overflow-x: hidden
        }
        .header
        {
            min-height: 100px;
           //border:1px solid red;
            background-color: #b1d4e5;
        }
          .sitename1
        {
            color: white;
            padding: 2px 0px 0px 32px;
            font-family:Haettenschweiler;
            letter-spacing: 8px;
            position: absolute;
            
        }
        .siteborder
        {
            width:100px;
            height: 50px;
            border: 2px solid white;
            border-top: none;
            margin-top:27px;
            margin-left: 10px;
            position: relative;
            float: left;
        }
        .sitename2
        {
            color:#041e42;
            padding-top: 15px;
            padding-left: 2px;
            
        }
        input[type=number],input[type=email]
        {
            //margin-top: 38px;
            //margin-left: 180px;
            padding: 5px;
            width: 290px;
        }
        .btn
        {
           // margin-left: 180px;
            margin-top: 10px;
            width: 290px;
            background: #041e42;
            color: white;
            border:none;
            height:40px;
        }   
        button
        {
            float: right;
            margin-top: 30px;
            margin-right: 50px;
            border:2px solid white;
            background: #041e42;
            color:white;
            width:100px;
            font-weight: bold;
            cursor: pointer;
            padding: 8px;
            transition: all 0.5s;      
        }
       button span 
        {
            position: relative;
            transition: 0.5s;
        }

        button span:after 
        {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        button:hover span {
          padding-right: 25px;
        }

        button:hover span:after {
          opacity: 1;
          right: 0;
        }
         #btn
        {
            float: right;
            margin-top: 30px;
            margin-right: 5px;
            border:2px solid white;
            background: #041e42;
            color:white;
            width:100px;
            font-weight: bold;
            cursor: pointer;
            padding: 5px;
            transition: all 0.5s;      
        }
     
          @media only screen and (max-width: 800px)
         {
             button{display: none;}  
             #btn{display: block;width:70px;padding: 2px;font-size:10px}
             .sitename1{font-size: 30px;padding-left: 13px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .siteborder{width:85px;height:40px;margin-left: -6px}
             .icon{font-size: 40px;}
              input{border: 1px solid grey}
            
             
        }
         @media only screen and (max-width: 500px) and (min-width:310px)
         {
              #email,#phone{max-width: 310px;}
             p{font-size: 15px;}
             h3{font-size: 20px;}
                input{border: 1px solid grey}
             .btn{max-width: 310px}
            
        }
          @media only screen and (max-width: 309px) and (min-width:200px)
         {
              #email,#phone{max-width: 198px;}
             p{font-size: 13px;}
             h3{font-size: 17px;}
                input{border: 1px solid grey}
            .btn{max-width: 198px}
        }
         @media only screen and (min-width: 800px)
         {
             #btn{display: none;}
        }
    </style>
</head>
<body>
   <!-- Add the Header-->
    <div class="container-fluid" style="//border:1px solid blue;">
        <div class="row header">
            <div class="col-md-6" style="//border:1px solid green">
                <a href="../index.php">
                 <h1 class="sitename1">SPT</h1>
                <div class="siteborder">
                        <h4 class="sitename2">INVOICE</h4>
                </div>
                </a>
                 <a href="../index.php"><input type="button" value="Home" id="btn"></a>
                <a href="../index.php"><input type="button" value="Login" id="btn"></a>
            </div>
            <div class="col-md-6" style="//border:1px solid red">
                <a href="../index.php"><button><span>Home</span></button></a>
                <a href="../index.php"><button><span>Login</span></button></a>
            </div>
        </div>
        <!--Add the Change Password Section-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="//border:1px solid red;">
                <h3 align="center" style="padding-top:50px;">Change Password</h3><hr width="40%">
                   
              <center>
                <form action="forgot_password.php" method="post">
                    <p align="center">Enter Your Registered Email Address below</p>
                    <input type="email" name="Remail" id="email" placeholder="Email" required><br><br>
                    <p align="center">Enter Your Registerd Mobile No below</p>
                    <input type="number" maxlength="10" id="phone" name="phone" placeholder="Phone No." required><br>
                    <input type="submit" value="Send OTP" class="btn" name="register">
                </form><br>
                </center>
               <?php
                    include("../conn/connection.php");
                    if(isset($_POST['verifyotp']))
                    {
                        $otp=$_POST['otp'];
                        if($_SESSION['otp']==$otp)
                        {
                           header("location:change_psw.php");
                        }
                        else
                        {
                            echo"<p align='center'><b>Incorrect OTP Try Again</b></p>";
                        }
                    }
                        if(isset($_POST['register']))
                        {
                            include("../conn/connection.php");
                            $email=$_POST['Remail'];
                            $mob=$_POST['phone'];
                            $sql="select mobile from register where email='$email'";
                            $rs=mysqli_query($con,$sql);
                            $rec=mysqli_fetch_array($rs);
                            
                            if($rec['mobile']==$mob)
                            {
                            require('textlocal.class.php');
                             include("creditional.php");
                              $textlocal = new Textlocal(false,false,API_KEY);
                             $_SESSION['phone']=$_POST['phone'];
                            $_SESSION['Remail']=$_POST['Remail'];
                            $numbers = array($_POST['phone']);
                            $sender = 'SPTINV';
                            $otp=mt_rand(100000,999999);
                            $message = "Dear User! This is Your Change Password OTP ".$otp;

                            try {
                                $result = $textlocal->sendSms($numbers, $message, $sender);
                                $_SESSION['otp']=$otp;
                                echo"<p align='center'>A OTP has been sent to Your Mobile No.<br>Please Enter The OTP below to Verify Your Number</p>";
                            } catch (Exception $e) {
                                die('Error: ' . $e->getMessage());
                            }
                            echo '  <center><form action="forgot_password.php" method="post">
                                        <input type="number" name="otp"><br>
                                        <input  type="submit" class="btn" name="verifyotp" value="Verify OTP">
                                    </form>
                                    </center>';
                            }
                            else
                            {
                                echo"<b>Incorrect number, Please enter the correct number which is registered from your Email.</b>";
                            }
                        }
                    ?>
                     
                     
            </div>
        </div>
    </div>
</body>
</html>
 <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>