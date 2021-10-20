<?php
    session_start();
    if($_SESSION['id']=="")
    {
        header("location:../index.php");
    }
    $user_id=$_SESSION['id'];
    $connect=new PDO('mysql:host=localhost;dbname=spt_invoice','root','');
    $statement=$connect->prepare("    
        SELECT * FROM invoice_data WHERE user_id='$user_id' ORDER BY order_id DESC     
    ");

    $statement->execute();
    $all_result= $statement->fetchAll();
    $total_rows= $statement->rowCount();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Invoices</title>
     <meta name="keywords" content="SPT, Invoice , Online Invoice Generator">
    <meta name="description" content="SPT, Invoice Generator, Online Bill Maker, Bill Generator , GST , GST Bill , Bill Gst, Good And Services Text">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!--Add Datatables-->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  
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
          // border:1px solid red;
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
          @media only screen and (max-width: 800px)
         {
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
        }
            @media only screen and (max-width: 500px)
         {
             #myTable{font-size: 10px;}
        }
    </style>
</head>
<body>
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
                <nav class="navbar navbar-expand-sm navbar-dark" style="background:black;//border:1px solid red">
                  
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                 <div class="collapse navbar-collapse" id="collapsibleNavbar" style="">
                   <ul class="navbar-nav navbar-right">
                        <li class="nav-item navbar-right">
                            <a href="welcome_c.php" style="float:right;margin-right:10px;padding:10px">Home</a>
                            
                       </li>
                       <li class="nav-item ">
                            <a href="composition.php" style="float:right;margin-right:10px;padding:10px">Create Invoices</a>
                            
                       </li>
                       <li>
                            <a href="view_Cinvoices.php" style="float:right;margin-right:10px;padding:10px">View Invoices</a>
                       </li>
                     </ul>
                           <a href="../action_files/logout.php" style="float:right;margin-right:10px;padding:10px;"><button class="btn btn-danger navbar-btn">Logout</button></a>
            
                    </div>
                </nav>
         </div>
      
          <!--Add the View Invoice Panel-->
       <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top:30px">
               <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead style="text-align:center;background:#28a745;color:white">
                        <tr>
                            <th>Invoice No.</th>
                            <th>Invoice Date</th>
                            <th>Total</th>
                            <th>Download</th>
                            <th>PDF</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center">
                       <?php
                            if($total_rows>0)
                            {
                                foreach($all_result as $row)
                                {
                                    echo'
                                        <tr>
                                            <td>'.$row["invoice_no"].'</td>
                                            <td>'.$row["invoice_dt"].'</td>
                                        ';
                                    if(($row["finaltotal"]=="") && $row["grandtotal"]!="")
                                        {
                                            echo '<td>'.$row["grandtotal"].'</td>';
                                        }
                                    else
                                        {
                                             echo '<td>'.$row["finaltotal"].'</td>';
                                        }
                                    echo' 
                                            <td><a href="invoice_download.php?pdf=1&id='.$row["order_id"].'" target="_blank"><i class="fa fa-download" style="font-size:25px;color:black"></i></a></td>
                                            <td><a href="print_invoice.php?pdf=1&id='.$row["order_id"].'" target="_blank"><i class="material-icons" style="font-size:25px;color:black">print</i></a></td>
                                            <td><a href="../action_files/deleteInvoice.php?id='.$row["order_id"].'"><i class="material-icons" style="font-size:25px;color:black">remove_circle</i></a></td>
                                        </tr>
                                        ';
                                }
                            }
                        ?>
                    </tbody>
                </table>
                </div>
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
    <!--Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>    
      <script>
      $(document).ready(function() {
            $('#myTable').DataTable( {
                order: [[ 3, 'desc' ]]
            } );
        });
        </script>

     