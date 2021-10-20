<?php
   session_start();
    if($_SESSION['wrong_psw']=="")
    {
        header("location:../index.php");
    }
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="SPT, Invoice , Online Invoice Generator">
    <meta name="description" content="SPT, Invoice Generator, Online Bill Maker, Bill Generator , GST , GST Bill , Bill Gst, Good And Services Text">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPT Online Invoice Generator</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="../css/index.css">-->
    
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <style>
            body
        {
            margin: 0;
            padding:0;
            overflow-x: hidden;
        }
        .overlay 
        {
           height: 100%;
           width: 0;
           position: fixed;
           z-index: 1;
           top: 0;
           left:0;
           background-color: rgb(0,0,0);
           background-color: rgba(0,0,0, 0.9);
           overflow-x: hidden;
          // border:1px solid white;
           transition: 0.3s;
        }
        .overlay-content
        {
           position: relative;
           top: 0;
           height: 100vh;
           width: 100%;
           text-align: center;
           //margin-top: 5px;
            //border:1px solid red;
         }
        .overlay .closebtn 
        {
           position: absolute;
           margin-top: -8px;
           right: 125px;
           font-size: 60px;
            color: white;
            transition: 0.5s;
            text-decoration: none;
        }
        .overlay .closebtn:hover
        {
           color:crimson;
        }
        .input-container 
        {
           display: -ms-flexbox; /* IE10 */
           display: flex;
           width: 100%;
           //border:1px solid red;
           margin-bottom: 15px;
        }
       
        .icons {
           padding: 12px;
            padding-top: 15px;
           background: #b1d4e5;
           color: black;
           min-width: 50px;
           text-align: center;
        }
       
        .input-field {
           width: 100%;
           padding: 10px;
           outline: none;
            color: dimgrey;
            font-weight: bold;
        }
        .input-field::placeholder
        {
            font-weight: normal;
        }
        .input-field:focus {
           border: 2px solid #b1d4e5;
        }

        /* Set a style for the submit button */
        #btn1 {
          background-color: #b1d4e5;
           color: black;
           padding: 1px 20px;
           border: none;
           cursor: pointer;
           width: 30%;
            font-weight: bold;
            height: 40px;
           opacity: 0.9;
            margin-right: 173px;
          //  margin-top: 5px;
        }
         #btn2{
          background-color: #b1d4e5;
           color: black;
           padding: 1px 20px;
           border: none;
           cursor: pointer;
           width: 30%;
            font-weight: bold;
            height: 40px;
           opacity: 0.9;
             margin-left: 21px;
            // margin-top: 5px;
        }
        
         
        .btn1:hover,.btn2:hover {
           opacity: 1;
        }
        .scheme_choice1,.scheme_choice2
        {
            color: white;
        }
        .schemeword
        {
           // padding-top: 6px;
            text-align: left
        }
        #radio1
        {
            height: 20px;
            width:20px;
        }
        #radio2
        {
            height: 20px;
            width:20px;
        }
         @media screen and (max-width: 550px) and (min-width:200px)
         {
             .input-container{width:70%;margin: auto;margin-bottom: 15px;}
             input[type=radio]{margin-left: 10px}
             #createAcc{font-size: 16px;}
             .overlay .closebtn{position: absolute;right: 20px;font-size:35px;}
             .schemeword{font-size: 12px;}
             .scheme_choice1,.scheme_choice2{padding-left: 3px;font-size: 12px;}
             #radio1,#radio2{//margin-left:15px;height:14px;width:14px;margin-bottom:2px;}
             #btn2{margin-left:7px;width:101px;}
             #btn1{margin-right:39px;width:101px;}
        }
        .diagonal
        {
            height: 100vh;
            background-image: linear-gradient(to top left,white 50%, #b1d4e5 50%);
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
            margin-top:27px;
            margin-left: 10px;
            position: relative;
            float: left;
            border-top:none;
            
        }
        .sitename2
        {
            color:#041e42;
            padding-top: 15px;
            padding-left: 1px;
            
        }
        .loginbox
        {
            width:602px;
            min-height: 200px;
          //  border: 1px solid black;
            box-sizing: border-box;
            float: right;
            margin: 220px 60px 0px 0px;
        }
         
        .input-grp
        {
            //border:1px solid red;
            width:285px;
            display: inline-block;
            height: 50px;
            box-sizing: border-box;
            position: relative;
        }
        .inp
        {
            width: 285px;
            //border: 1px solid black;
            box-sizing: border-box;
            height: 50px;
            color: dimgrey;
            padding-left: 20px;
        }
        #pswBox{margin-left: 25px;}
        .input-grp span
        {
            position: absolute;
            top:12px;
            left:20px;
            padding: 0;
            transition: 0.5s;
            pointer-events: none;
        }
        #usericon{font-size: 56px;}
        @media only screen and (max-width: 800px) and (min-width: 605px)
        {
            .loginbox{width:602px;margin:auto;margin-top: 120px;//margin-left: 20px}
            .overlay .closebtn{right:15px;position: absolute}
           // .input-grp{display: flex;margin: auto}
            #pswBox{margin-left: 25px;}  
            #loginbtn{width:602px;//margin-left:136px;//display: flex;text-align: center}
            .bottomline,.forgot_link{font-size: 13px;}
            .footer{margin-top: 35px;//margin-left: -25px;}
            #incorrect{font-size:14px;}
        }
        
        
       @media screen and (max-width: 600px) and (min-width: 350px)
        {
            .loginbox{width:349px;margin: auto;margin-top: 120px;}
            .overlay .closebtn{right:15px;position: absolute}
            #line{font-size: 15px}
            #usericon{font-size: 28px;}
             .input-grp{display: flex;margin: auto}
             #pswBox{margin:auto;margin-top: 20px;} 
            .inp{height:40px;}
            .input-grp span{top:8px}
             .input-container input,textarea{font-size:14px;}
             #loginbtn{width:285px;margin-left:32px;height:40px;font-size: 15px}
            #eye{top:2px;position: absolute;}
            .bottomline,.forgot_link{font-size: 11px;padding-left: 13px;}
            .footer{margin-top: 130px;//margin-left: -25px;}
            #incorrect{font-size:10px;}
        }
        @media only screen and (max-width:349px)
        {
            .loginbox{width:290px;margin: auto;margin-top: 120px;}
            #line{font-size: 15px}
            #usericon{font-size: 28px;}
             .input-grp{display: flex;margin: auto;margin-left: 10px;}
             #pswBox{margin:auto;margin-top: 20px;margin-left: 10px;} 
            .inp{height:40px;width:275px}
            .input-grp span{top:8px}
             #loginbtn{width:275px;margin-left:10px;height:40px;font-size: 15px}
            #eye{top:2px;position: absolute;}
            .bottomline,.forgot_link{font-size: 10px}
             .input-container input,textarea{font-size:12px;}
            .footer{margin-top: 30px;margin-left: -25px;}  
            #incorrect{font-size:10px;}
        }
        #eye.active
        {
            color: dodgerblue;
        }
        .input-grp .inp:focus ~ span,
        .input-grp .inp:valid ~ span
        {
            top:-16px;
            left:12px;
            padding: 2px 4px;
            border: 1px solid #000;
            background: black;
            color: white;
            font-size: 12px;
        }
        
        input[type=submit]
        {
            width:599px;
            background-color: #041e42;
            //margin-left: 0px;
            margin-top: 20px;
            height: 50px;  
            color:white;
            font-size: 20px;
            border: none;
        }
        input[type=submit]:hover
        {
            opacity: 0.8;
        }
        .bottomline
        {
            margin-left: 1px;
            margin-top: 10px;
            color: #757575;
            float: left; 
        }
        .forgot_link
        {
            float: right;
            margin-top: 10px;
            margin-right: 1px;
            text-decoration: underline;
            color: #041e42;
        }
       
        .btn-7
        {
            float: right;
            margin-right: 75px;
            margin-top: 30px;
            width: 100px;
            background-color: transparent;
            color: black;
            border: 2px solid #041e42;
            height: 40px;    
            border-radius: 4px;
            transform: 0.5s ease-in-out;
            cursor: pointer;
            //line-height: 0px;
           // position: relative;
            display: block;
            font-weight: bold;
           
            
        }
        .btn-7:before
        {
            content: '';
            position: absolute;
            left:0px;
            top:0;
            width:100%;
            height:100%;
            background: #041e42;
            z-index: -1;
            transition: transform 0.5s;
            transform-origin: bottom right;
            transform: scale(0);
            
        }
        .btn-7:hover:before
        {
            transition: transform 0.5s;
            transform-origin: top left;
            transform: scale(1);
        }
       .box
        {
            margin-left: 50px;
            margin-top: 30px;
            float: left;
            //border:1px solid red;
            position: relative;
            width: 100px;
            height: 40px;
            text-align: center;
            background: #041e42;
            overflow: hidden;
            color: white;
            border-radius: 4px;
        }
         .box .icon
        {
            width: 100%;
            height: 100%;
            transition: 0.5s;
            line-height: 50px;   
        }
        .box:hover .icon{ transform: scale(0)}
        .box .details
        {
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            transform: scale(2);
            opacity: 0;
            background-color:#dc3545;
            transition: 0.5s;
        }
        .box:hover .details
        {
            transform: scale(1);
            opacity: 1;
        }
        .details h3
        {
            font-size: 12px;;
            margin: 0;
            padding: 0;
            line-height: 40px;
        }
       
        .copyright
        {
            //font-weight: bold;
            padding: 7px;
            background-color: #041e42;
            color: white;
            float: left;
            background-clip: text;
            font-size: 12px;
            margin:-2px 0px 0px 5px;
        }
        @media only screen and (max-width: 1000px)
        {
            .box
            {
               display: none;
            }
            .btn-7{margin-right:60px}
            
            
        }
         @media only screen and (max-width: 700px)
         {
             .btn-7{margin-right:30px}
        }
           @media only screen and (max-width: 575px)
         {
             .btn-7{display: none;}
             .btn-5{;margin-right:-2px; display: block;}
             .sitename1{font-size: 30px;padding-left: 13px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .siteborder{width:85px;height:40px;margin-left: -6px}
               #call{font-size: 10px;}
        }
         @media only screen and (min-width:575px)
         {
            .btn-5{display: none}
             
        }
            @media only screen and (min-width:1000px)
        {
            #call{display: none;}
        }
         .btn-5
        {
            float: right;
            //margin-right:2px;
            margin-top: 20px;
            width: 80px;
            background-color: transparent;
            color: black;
            border: 2px solid #041e42;
            height: 30px;    
            border-radius: 4px;
            transform: 0.5s ease-in-out;
            cursor: pointer;
            font-weight: bold; 
            font-size: 12px;
        }
        .btn-5:before
        {
            content: '';
            position: absolute;
            left:0px;
            top:0;
            width:100%;
            height:100%;
            background: #041e42;
            z-index: -1;
            transition: transform 0.5s;
            transform-origin: bottom right;
            transform: scale(0);
            
        }
        .btn-5:hover:before
        {
            transition: transform 0.5s;
            transform-origin: top left;
            transform: scale(1);
        }
      #abb
        {
           position:absolute;top:12px;left:250px;cursor:pointer;
        }
        #call{float: right;background-color: #041e42;background-clip: text;color: white;padding: 5px;}
    </style>
</head>
    <body onload="invalidEP()">  
       <!---Add a Sign Up Form-->  
        <div class="container">
            <div id="register" class="overlay">   
              <div class="overlay-content">
                   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <h2 id="createAcc" style="color:white;padding-top:30px;font-family:poppins">Create Your Account</h2>
                    <hr width="50%" color="white">
                    <form action="../OTP/otp.php" style="max-width:500px;margin:auto" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return checkpsw()">
                        <div class="input-container">
                            <i class='fas fa-briefcase icons'></i>
                             <input class="input-field" type="text" placeholder="Business name" name="b_name" required="required">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-envelope icons"></i>
                            <input class="input-field" type="email" placeholder="Email" name="email" required="required">
                        
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icons"></i>
                            <input class="input-field" type="password" placeholder="Password" name="psw" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" maxlength="50" id="psw_val">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icons"></i>
                            <input class="input-field" type="password" placeholder="Confirm Password" name="c_psw" required="required" minlength="8" id="cpsw_val" on>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-phone icons"></i>
                            <input class="input-field" type="number" placeholder="Mobile No." name="mob" required="required" maxlength="10">
                        </div>
                        <div class="input-container">
                           <i class='fas fa-file-code icons'></i>
                            <input class="input-field" type="text" maxlength="15"  minlength="15"  id="gstn" onblur="toUpper()" placeholder="GSTIN No." name="gstin" required="required">
                            
                        </div>
                        <div class="input-container">
                            <i class='fas fa-address-book icons'></i>
                           <textarea class="input-field"  style="resize:none;" name="address" placeholder="Address" required="required"></textarea>
                        </div>
                         <div class="input-container" style="//border:1px solid #b1d4e5;height:30px">
                           <table width="500px" height="30px">
                            <tr>
                                <td><p style="color:white;font-weight:bold;" class="schemeword">Scheme :</p></td>
                                <td valign="middle"><label for="Regular"><input type="radio"  id="radio1" name="choice" value="Regular" required="required"></label>
                                <td align="left" valign="top"><p class="scheme_choice1" >Regular</p></td>
                                 <td valign="middle"><label for="Composition"><input type="radio"  id="radio2" name="choice" value="Composition" required="required"></label>
                                <td align="left" valign="top"><p class="scheme_choice1" >Composition</p></td>
                             </table>
                        </div>
                        <button type="submit" id="btn1" name="register" style="//margin-right:173px">Register</button>
                        <button type="reset" id="btn2" style="//margin-left:21px">Reset</button>
                </form>
              </div>
        </div>
        </div>
        <!--End the Sign Up Form And Add the Header-->
        <div class="container-fluid diagonal">
            <div class="row" style="//border:1px solid red;">
                <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-6 wow fadeInDown" data-wow-delay="0.2s"  style="//border:2px solid green">
                    <a href="../index.php">
                    <h1 class="sitename1 wow fadeInDown" data-wow-delay="0.2s">SPT</h1>
                    <div class="siteborder">
                        <h4 class="sitename2">INVOICE</h4>
                    </div>
                    </a>
                      <button class="btn-5 wow bounceInRight" data-wow-delay="1.5s" onclick="openNav()"><span>SIGN UP</span></button>
                </div>
                <div class=" col-lg-6 col-md-3 col-sm-3 col-xs-3" style="//border:1px solid yellow">
                    <div class="box wow bounceInUp" data-wow-delay="0.6s" style="//margin-left:100px">
                        <div class="icon"><i class="material-icons">location_on</i></div>
                        <div class="details"><h3>India</h3></div>
                    </div>
                    <div class="box wow bounceInUp"  data-wow-delay="0.9s">
                        <div class="icon"><i class="material-icons">call</i></div>
                         <div class="details"><h3>9634704464</h3></div> 
                    </div>
                    <div class="box wow bounceInUp"  style="width:141px"  data-wow-delay="1.2s">
                        <div class="icon"><i class="material-icons">email</i></div>
                        <div class="details"><h3 style="font-size:9px">tyagiandchoudharyco@gmail.com</h3></div>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3" style="//border:1px solid blue">
                    <button class="btn-7 wow bounceInRight" data-wow-delay="1.5s" onclick="openNav()"><span>SIGN UP</span></button>
                </div>
            </div>
                  <!--Add the Login box-->
                   <div class="row" style="//border:1px solid red">
                
                    <div class="col-md-12" style="//border:1px solid yellow">
                        <div class="loginbox">
                            <center><i class='fas fa-user-circle wow fadeInUp' id="usericon"  data-wow-delay="2.0s" style="color:#041e42"></i></center>
                            <b><p align="center" style="padding-top:10px;color:#041e42;letter-spacing:4px;  font-family: 'Raleway', 'Open Sans', sans-serif" class="wow fadeInUp" id="line"  data-wow-delay="2.4s">Login Your Account</p></b><hr class="wow fadeInUp"  data-wow-delay="2.8s">
                             <p style="background:#808080;color:white;padding-left:6px;margin-top:-10px" id="incorrect">Incorrect Email/Password, Please Enter The Correct Email Or Password</p>
                            <form action="../action_files/login.php" method="post">
                               <div class="input-grp wow fadeInUp"  data-wow-delay="3.2s">
                                    <input type="email" class="inp" name="email" required>
                                    <span>Email</span>
                                </div>
                                <div class="input-grp  wow fadeInUp" id="pswBox" data-wow-delay="3.6s" style="//margin-left:25px;">
                                    <input type="password" minlength="8" class="inp" name="psw" id="pwd" required>
                                    <span>Password</span>
                                    <abbr title="Show Password" id="abb" style=""><i class='fas fa-eye' id="eye"></i></abbr>
                                </div>
                                
                                <input type="submit" class="wow fadeInUp" id="loginbtn"  data-wow-delay="4.0s" name="login" value="LOG IN">
                                <p class="bottomline wow fadeInUp"  data-wow-delay="4.4s">Don't Have an Account <span onclick="openNav()"  style="color:#041e42;text-decoration:underline;cursor:pointer">Register</span></p>
                                <a href="../OTP/forgot_password.php" class="forgot_link wow fadeInUp"  data-wow-delay="4.8s">Forgot Password?</a>
                            </form>
                        </div>
                       </div>
                </div>
                <!--Add the Footer-->
                <div class="row footer" style="//border:1px solid red;//margin-top:9px;">
                    <div class="col-md-12" style="//border:1px solid black;">
                        <p class="copyright wow bounceInRight"  data-wow-delay="5.2s"> &copy;2019 SPT Invoice.</p>
                           <p  id="call" ><i class="material-icons" style="font-size:18px;padding-top:2px;">call</i> 9634704464</p>
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
    <!--font awesome icon-->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Add Wow JS
    <script src="../js/wow.js"></script>
    <script src="../js/wow.min.js"></script>-->
    <script>
              new WOW().init();
    </script>
    <script src="../js/index.js"></script>
    <script>
    function checkpsw()
        {
        x=document.forms["myForm"]["psw"].value;
        y=document.forms["myForm"]["c_psw"].value;
        if(x!=y)
        {
           swal( "Oops" ,  "Confirm Password Does Not Match" ,  "error" );
        return false;
        }
        }
        var pwd=document.getElementById('pwd');
        var eye=document.getElementById('eye');
        
        eye.addEventListener('click',togglePass);
        function togglePass()
        {
            eye.classList.toggle('active');
            (pwd.type=='password') ? pwd.type='text' : pwd.type='password'; 
        }
</script>

<script>
        function openNav() 
        {
          document.getElementById("register").style.width = "100%";
        }
        function closeNav()
        {
          document.getElementById("register").style.width = "0%";
        }
        function invalidEP()
         {
             swal( "Oops" ,  "Incorrect Email/Password" ,  "error" );
         }
         function toUpper()
        {
            var gstn=document.getElementById('gstn').value;
            var uppergstn=gstn.toUpperCase(); 
            if(uppergstn.length != 15)
            {
                swal( "Oops" ,  "GSTIN is Not Valid Please Enter The Correct GSTIN No." ,  "error" );  
            }
            else{
                document.getElementById('gstn').value=uppergstn;
            }
        }
     </script>
                 