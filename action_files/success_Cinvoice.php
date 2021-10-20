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
    if($rec['scheme']!='Composition')
    {
        header("location:../index.php");
    }
    if(isset($_POST['create']))
    {
        $party_name=$_POST['party_name'];
        $gstin1=trim($_POST['gstin']);
        $address1=$_POST['address'];
        $state_code1=trim($_POST['state_code']);
        $invoice_no=trim($_POST['invoice_no']);
        $invoice_date=$_POST['date'];
        @$grandtotal=trim($_POST['grandtotal']);
        @$gst_type_1=trim($_POST['gst_type_1']);
        @$gst_type_2=trim($_POST['gst_type_2']);
        $gst_rate_1=trim($_POST['gst_rate_1']);
        @$gst_rate_2=trim($_POST['gst_rate_2']);
        @$total_1=trim($_POST['total_1']);
        @$total_2=trim($_POST['total_2']);
        @$final_total=trim($_POST['final_total']);
        @$inwords=$_POST['inwords'];
        @$notes=$_POST['notes'];
        @$bank_name=trim($_POST['bank_name']);
        @$ifsc=trim($_POST['ifsc']);
        @$account=trim($_POST['account']);
        @$branch=$_POST['branch'];
        @$sign=$_POST['sign'];
    }
    include("../conn/connection.php");
    if(isset($_POST['create']))
    {
        $sql1="insert into invoice_data
        (user_id,party_name,gstin,address,state_code,invoice_no,invoice_dt,grandtotal,gst_type1,gst_type2,gst_rate1,gst_rate2,
         total_1,total_2,finaltotal,inwords,notes,bank_name,ifsc,account,branch,sign,created_dt)
        values('$user_id','$party_name','$gstin1','$address1','$state_code1','$invoice_no','$invoice_date','$grandtotal','$gst_type_1','$gst_type_2','$gst_rate_1','$gst_rate_2','$total_1','$total_2','$final_total','$inwords','$notes','$bank_name','$ifsc','$account','$branch','$sign',now())";
        
        if(mysqli_query($con,$sql1))
        {
            $last_id=mysqli_insert_id($con);
            header("location:success_Cinvoice.php");
        }
        else
        {
            echo"Not SuccessFull".mysqli_error($con);
        }
     
        $sql2="insert into invoice_item(user_id,order_id,invoice_no,particular,hsnSac,qty,rate,discount,total,created_dt) values";
        for($i=0;$i<count($_POST['particular']);$i++)
        {
           $sql2 .="('$user_id','$last_id','$invoice_no','".$_POST['particular'][$i]."','".$_POST['hsnSac'][$i]."',
                    '".$_POST['qty'][$i]."','".$_POST['rate'][$i]."','".$_POST['dis'][$i]."','".$_POST['total'][$i]."',now()),";
        }
        
        $sql2=rtrim($sql2,",");
        if(mysqli_query($con,$sql2))
        {
            header("location:success_Cinvoice.php");
        }
        else
        {
            echo"Not SuccessFull".mysqli_error($con);
        }
    }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Invoice Created</title>
     <meta name="keywords" content="SPT, Invoice , Online Invoice Generator">
    <meta name="description" content="SPT, Invoice Generator, Online Bill Maker, Bill Generator , GST , GST Bill , Bill Gst, Good And Services Text">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
  
    <style>
              body
        {
            margin: 0;
            padding: 0;
           // overflow-x: hidden;
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
        .icon
        {
            padding-top: 100px;
            color: #041e42;
            
        }
        a
        {
            color: white;
            font-weight: bold;
             font-size: 14px;
        }
        a:hover
        {
            color: #aaaaaa;
            text-decoration: none;
              transition: 0.5s;
        }
         @media only screen and (max-width: 799px)
         {
             #autowrite{font-size: 15px;}
              .image{width: 100%;height:248px}
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
        }
    </style>
</head>
<body onload="success()">
        <!--Add the Header-->
     <div class="container-fluid" style="//border:1px solid blue;">
        <div class="row header">
            <div class="col-md-6" style="//border:1px solid green">
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
                <nav class="navbar navbar-expand-sm navbar-dark" style="background:black;//border:1px solid red;">
                  
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                 <div class="collapse navbar-collapse" id="collapsibleNavbar">
                   <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../files/welcome_c.php" style="float:right;margin-right:10px;padding:10px">Home</a>
                            
                       </li>
                       <li class="nav-item">
                            <a href="../files/composition.php" style="float:right;margin-right:10px;padding:10px">Create Invoices</a>
                            
                       </li>
                       <li>
                            <a href="../files/view_Cinvoices.php" style="float:right;margin-right:10px;padding:10px">View Invoices</a>
                       </li>
                       </ul>
                        <a href="logout.php" style="float:right;margin-right:10px;padding:10px;"><button class="btn btn-danger navbar-btn">Logout</button></a>
                    </div>
                </nav>
         </div>
         <!--Add the Success Invoice-->
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top:50px">
                <p style="color:white;font-size:15px;padding:10px;background:#009059"><b>Your Invoice has been Created Successfully.</b></p>
            </div>
        </div>
        <!--Add the Footer-->
        <div class="row">
                <div class="col-md-12 footer " style="background:#041e42;height:50px;margin-top:345px">
                    <p style="padding-top:11px;color:white" class="copyright"> &copy;2019 SPT Invoice</p>
                </div>
            </div>
      
    </div>
</body>
</html>
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
        <script>
            function success()
          {
              swal("Ok","Your Invoice has been created Successfully","success");
          }
        </script>