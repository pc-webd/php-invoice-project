<?php
    ob_start();
    session_start();
    include("../conn/connection.php");
    @$_SESSION['email']=htmlentities($_POST['email']);
    $email=$_SESSION['email'];
    @$_SESSION['gstin']=htmlentities($_POST['gstin']);
    $gstin=$_SESSION['gstin'];
    $sql="select * from register where email='$email' or gstin='$gstin'";
    $rs=mysqli_query($con,$sql);
    $rec=mysqli_fetch_array($rs);
    if($rec['email']==$email)
    {
        header("location:../files/user_exist.php");
    }
    else if($rec['gstin']==$gstin)
    {
        header("location:../files/gstin_exist.php");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
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
        input[type=number]
        {
           // margin-left: 180px;
            padding: 5px;
            width: 290px;
        }
        button
        {
           // margin-left: 180px;
            margin-top: 10px;
            width: 290px;
            background: #041e42;
            color: white;
            border:none;
            height:40px;
        }
        .terms
        {
            padding-top: 5px;
            text-align: justify;
            font-weight: bold;
            padding-left: 50px;
        }
        //.otp{border: 1px solid black}
        @media screen and (max-width: 770px)
        {
            .otp1{width:200px;margin-top:20px;border:1px solid black}
            button{width:200px;}
            .sitename1{font-size: 30px;padding-left: 13px;}
            .sitename2{font-size: 20px;padding-top: 7px}
            .siteborder{width:85px;height:40px;margin-left: -6px}
            .home_btn{display: none;}
            .terms{font-size:12px;}
            #home_btn{display: block;}
        }
          @media screen and (min-width: 770px)
          {
                #home_btn{display: none;}
        }
        .home_btn
        {
            float: right;
            margin: 27px 30px 0px 0px;
            background: #041e42;     
            border: 2px solid white;
            color: white;
            padding: 5px;
            width:100px;
        }
        #home_btn
        {
            background: #041e42;     
            border: 2px solid white;
            color: white;
            padding: 5px;
            width:80px;
            float: right;
            margin: 20px 0px 0px 0px;
        }
        mark
        {
            background:#041e42;
            color: white;
            padding:3px;
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="//border:1px solid blue;">
        <div class="row header">
            <div class="col-md-6" style="//border:1px solid green">
                <a href="../index.php">
                 <h1 class="sitename1">SPT</h1>
                <div class="siteborder">
                        <h4 class="sitename2">INVOICE</h4>
                </div>
                </a>
                <a href="../index.php" ><input type="button" id="home_btn" value="Home"></a>
            </div>
            <div class="col-md-6" style="//border:1px solid green">
                <a href="../index.php"><input type="button" class="home_btn" value="Home"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="//border:1px solid red;">
                <h3 align="center" style="padding-top:50px;">OTP Verification</h3><hr width="90%">
                <!--send the OTP-->
                     <?php
                        if(isset($_POST['register'])){
                            if(($rec['email']!=$email) && ($rec['gstin']!=$gstin)){
                            require('textlocal.class.php');
                                include("creditional.php");
                              $textlocal = new Textlocal(false,false,API_KEY);
                                  $_SESSION['b_name']=htmlentities($_POST['b_name']);
                                  $_SESSION['new_email']=htmlentities($_POST['email']);
                                  $_SESSION['psw']=htmlentities($_POST['psw']);
                                  $_SESSION['new_mob']=$_POST['mob'];
                                  $_SESSION['new_gstin']=htmlentities($_POST['gstin']);
                                  $_SESSION['address']=$_POST['address'];
                                  $_SESSION['scheme']=$_POST['choice'];
                                if( empty($_SESSION['b_name']) || empty($_SESSION['new_email']) || empty( $_SESSION['psw'])|| empty( $_SESSION['new_mob']) || empty( $_SESSION['gstin']) || empty(  $_SESSION['scheme']))
                                {
                                    header("location:../index.php");
                                }
                            $numbers = array($_POST['mob']);
                            $sender = 'SPTINV';
                            $otp=mt_rand(100000,999999);
                            $message = "Dear User! Your One Time Password (OTP) is ".$otp;

                            try {
                                $result = $textlocal->sendSms($numbers, $message, $sender);
                                $_SESSION['otp']=$otp;
                                echo"<p align='center'>A OTP has been sent to Your Mobile No.<br>Please Enter The OTP below to Verify Your Number</p>";
                            } catch (Exception $e) {
                                die('Error: ' . $e->getMessage());
                            }
                        }
                    }
                    ?>  
                <?php
                    
                    if(isset($_POST['verifyotp']))
                    {
                        $otp1=$_POST['otp'];
                        if($_SESSION['otp']==$otp1)
                        {
                            include("../conn/connection.php");
                            $b_name=$_SESSION['b_name'];
                            $new_email=$_SESSION['new_email'];
                            $psw=md5($_SESSION['psw']);
                            $new_mob=$_SESSION['new_mob'];
                            $new_gstin=$_SESSION['new_gstin'];
                            $address=$_SESSION['address'];
                            $scheme=$_SESSION['scheme'];
                            $sql1="insert into register(b_name,email,password,mobile,gstin,address,scheme,created_dt)
                            values('$b_name','$new_email','$psw','$new_mob','$new_gstin','$address','$scheme',now())"; 
                            if(mysqli_query($con,$sql1))
                            {
                                header('location:../files/signup_welcome.php');
                            }
                        }else{
                            echo'Please Enter Correct OTP';
                        }
                     }   
                ob_end_flush();
                ?>
                <center>
                <!--Verify Otp Section-->
                <form action="otp.php" method="post">
                    <input type="number" required="required" maxlength="6" minlength="6" name="otp" class="otp1"><br>
                    <button type="submit" name="verifyotp">Verify</button>
                </form>
                </center>
            </div>
        </div>
          
           <!--Terms And Conditions-->
            <div class="row">
                <div class="col-lg-12" style="//border:1px solid red">
                    <p style="padding-top:20px"><i><u>Terms and Conditions :</u></i></p>
                    <p align="center" class="terms">“Any personal data collected will be used by <mark><span style="">SPT Invoice</span></mark> to contact you via phone,SMS or email for marketing and to deliver certain updates for services or information you have requested.”</p>
                </div>
            </div>
            <!--Add the Footer-->
            <div class="row">
                <div class="col-md-12 footer " style="background:#041e42;height:50px;margin-top:133px">
                    <p style="padding-top:11px;color:white"> &copy; 2019 SPT Invoice</p>
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