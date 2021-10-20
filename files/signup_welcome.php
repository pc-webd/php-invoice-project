
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   
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
            border-top: none;
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
        .icon
        {
            padding-top: 100px;
            color: #041e42;
            font-size: 86px;
            
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
       #btn span 
        {
            position: relative;
            transition: 0.5s;
        }

        #btn span:after 
        {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        #btn:hover span {
          padding-right: 25px;
        }

        #btn:hover span:after {
          opacity: 1;
          right: 0;
        }
         @media only screen and (max-width: 800px)
         {
             button{display: none;}  
             #btn{display: block;width:70px;padding: 2px;font-size:10px}
             .sitename1{font-size: 30px;padding-left: 13px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .siteborder{width:85px;height:40px;margin-left: -6px}
             .icon{font-size: 40px;}
             #wel{font-size: 14px}
             
        }
         @media only screen and (min-width: 800px)
         {
             #btn{display: none;}
        }
    </style>
</head>
<body onload="success()">
   <!--Add the header-->
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
        <!--Add the Success Sign Up Section-->
        <div class="row">
           <div class="col-md-12" style="//border:1px solid red;">
               <center><i class='fas fa-check-circle icon' style='color:#041e42;'></i></center>
           <h4 align="center" style="color:#041e42;padding-top:20px" id="wel">Welcome</h4>
            <h4 align="center" style="color:#041e42;padding-top:3px" id="wel">You are Successfully Registered in SPT Invoice , Create Your Invoice, It is Free and Easy To Use.</h4>
            </div>
        </div>
        <script>
            function success()
            {
                swal("Thank You!", "You are Successfully Signed Up", "success");
            }
        </script>
    </div>
</body>
</html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   