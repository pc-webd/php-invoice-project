<?php
    session_start();
    if($_SESSION['id']=="")
    {
        header("location:../index.php");
    }
    $user_id=$_SESSION['id'];
    include("../conn/connection.php");
    $sql="select * from register where id='$user_id'";
    $rs=mysqli_query($con,$sql);
    $rec=mysqli_fetch_array($rs);
    if($rec['scheme']!='Regular')
    {
        header("location:../index.php");
    }
    if(isset($_SESSION['id']))
    {
        if((time() - $_SESSION['last_login_timestamp'])>3600)
        {
            header("location:../action_files/logout.php");
        }
    }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
   
   
   
    <style>
        body
        {
            margin: 0;
            padding: 0;
        }
        .header
        {
            min-height: 100px;
           //border:1px solid red;
            background-color: #b1d4e5;
            position: relative;
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
            border-top:none;
            float: left;
        }
        .sitename2
        {
            color:#041e42;
            padding-top: 15px;
            padding-left: 2px;
            
        }
        h3
        {
            font-size: 25px;
            font-family: sans-serif;
        }
        .image
        {
            width:100%;
            height:518px;
           // filter:blur(2px);
        }
        a{
            font-weight: bold;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }
        a:hover
        {
            text-decoration: none;
            color:#aaaaaa;
            transition: 0.5s;
        }
         @media only screen and (max-width: 800px) and (min-width: 400px)
         {
             #autowrite{font-size: 20px;}
             .image{width: 100%;height:297px}
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 15px;}
             a{color: white}
             .siteborder{width:85px;height:40px;margin-left:1px}
        }
         @media only screen and (max-width: 399px) and (min-width:321px)
         {
             #autowrite{font-size: 15px;}
              .image{width: 100%;height:248px}
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
        }
          @media only screen and (max-width: 320px)
          {
                #autowrite{font-size: 15px;}
              .image{width: 100%;height:208px}
             .sitename1{font-size: 30px;padding-left: 17px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 10px}
             .siteborder{width:85px;height:40px;margin-left: 1px}
        }
    </style>
</head>
<body onload="typeWriter()">
    <!--Add the Header-->
     <div class="container-fluid" style="//border:1px solid blue;">
        <div class="row header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="//border:1px solid green">
                <a href="../index.php">
                 <h1 class="sitename1">SPT</h1>
                <div class="siteborder">
                        <h4 class="sitename2">INVOICE</h4>
                </div>
                </a>
            </div>
         </div>
    </div>
            <!--Add the Navbar-->
              <div class="container-fluid" style="//border:1px solid red;background:black">  
                <nav class="navbar navbar-expand-sm navbar-dark" style="background:black;//border:1px solid red">
                  
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                 <div class="collapse navbar-collapse" id="collapsibleNavbar" style="">
                   <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="welcome_r.php" style="float:right;margin-right:10px;padding:10px">Home</a>
                            
                       </li>
                       <li class="nav-item">
                            <a href="regular.php" style="float:right;margin-right:10px;padding:10px">Create Invoices</a>
                            
                       </li>
                       <li>
                            <a href="view_Rinvoices.php" style="float:right;margin-right:10px;padding:10px">View Invoices</a>
                       </li>
                     </ul>
                      <a href="../action_files/logout.php" style="float:right;margin-right:10px;padding:10px;"><button class="btn btn-danger navbar-btn">Logout</button></a>
                    </div>
                </nav>
    </div>
    <!--Add the Image Section-->
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 align="center" id="autowrite" style="padding-top:40px"></h3>
            <hr width="80%">
        </div>
    </div>
    <div class="row" style="//position:absolute">
        <div class="col-md-12" style="//border:1px solid black;//position:relative">
            <img src="../image/banner.png" alt="" style="margin-top:-50px" class="image img-responsive">
             
        </div>
    </div>
    
    <div class="row" style="margin-top:2px;">
        <div class="col-md-12" style="background:#041e42;">
            <h6 style="color:white;padding-top:10px" class="copyright"> &copy;2019 SPT Invoice</h6>
        </div>
    </div>
    </div>
    </body>
</html>
<script>
			var i = 0;
			var txt = 'Welcome to SPT Invoice Create Your Free Invoices on our Software ';
			var speed = 70;

			function typeWriter() {
			  if (i < txt.length) {
				document.getElementById("autowrite").innerHTML += txt.charAt(i);
				i++;
				setTimeout(typeWriter, speed);
			  	}
			}
	</script>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
    <!-- Jquery Plugin-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/regular.js"></script>