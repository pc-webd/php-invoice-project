<?php
        session_start();
    if($_SESSION['phone']=="")
    {
        header("location:../index.php");
    }
    $register_num=$_SESSION['phone'];
    $remail=$_SESSION['Remail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Password</title>
    <meta charset="UTF-8">
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
        input[type=password]
        {
            padding: 5px;
            width: 290px;
        }
        .btn
        {
            margin-top: 10px;
            width: 290px;
            background: #041e42;
            color: white;
            border:none;
            height:40px;
        }  
        .button
        {
            float: right;
            margin-top: 30px;
            margin-right: 50px;
            border:2px solid white;
            background: #041e42;
            color:white;
            width:120px;
            font-weight: bold;
            cursor: pointer;
            padding: 2px;
            transition: all 0.5s;      
        }
       .button span 
        {
            position: relative;
            transition: 0.5s;
        }

        .button span:after 
        {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
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
        @media only screen and (min-width: 800px)
         {
             #btn{display: none;}
        }
            @media only screen and (max-width: 500px) and (min-width:310px)
         {
              #psw{max-width: 310px;}
             p{font-size: 15px;}
             h3{font-size: 20px;}
                input{border: 1px solid grey}
             .btn{max-width: 310px}
            
        }
          @media only screen and (max-width: 309px) and (min-width:200px)
          {
              #psw{max-width: 198px;}
             p{font-size: 13px;}
             h3{font-size: 17px;}
                input{border: 1px solid grey}  
              .btn{max-width: 198px}
        }
    </style>
</head>
<body>
   
    <div class="container-fluid" style="//border:1px solid blue;">
        <!--Add the header-->
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
                <a href="../index.php"><button class="button"><span>Home</span></button></a>
                <a href="../index.php"><button class="button"><span>Login</span></button></a>
            </div>
        </div>
      
     <?php
        if(isset($_POST['psw']))
        {
            $new_psw=md5($_POST['psw']);
            include("../conn/connection.php");
            $sql="update register set password='$new_psw' where mobile='$register_num' and email='$remail'";
            if(mysqli_query($con,$sql))
            {
                echo"<p align='center' style='padding-top:30px;'>Password Change Successfully</p>";
            }
            else
            {
                echo"Password Doesn't Change";
            }
        }
    ?>
           <!--Add the Change Password section-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="//border:1px solid red;">
                <h3 align="center" style="padding-top:50px;">Change Password</h3><hr width="40%">
                <center>
                <form action="change_psw.php" method="post" name="myForm" onsubmit="return checkpsw()">
                    <p align="center"><b>Set Your New Password</b></p>
                    <input type="password" minlength="8" name="psw" id="psw" placeholder="New Password" style="Padding:5px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" maxlength="50" required><br><br>
                    <input type="password" name="c_psw" id="psw" placeholder="Confirm Password" style="padding:5px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" maxlength="50" required><br>
                    <button type="submit" class="btn" name="save" >Save</button>
                </form>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
  <script>
            function checkpsw()
            {
                x=document.forms["myForm"]["psw"].value;
                y=document.forms["myForm"]["c_psw"].value;
                if(x!=y)
                {
                    swal ( "Oops" ,  "Confirm Password Doesn't Match" ,  "error" )
                    return false;
                }
            }
</script>
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>