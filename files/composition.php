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
?>
<!DOCTYPE html>
<html lang="en">
<head>
     
    <meta charset="UTF-8">
    <title>Create Composition Invoice</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        .B_name
        {
          text-align:center;  
          padding-top:10px;
          font-family:sans-serif;
          font-size:25px;
          color:white;
          letter-spacing:1px;
          text-transform:uppercase
        }
        .taxHeading
        {
            text-align:center;
            color:white;
            padding-bottom:5px;
            font-family:sans-serif;
            letter-spacing:1px;
            text-transform:uppercase;
            font-size:22px;
        }
        .B-info,.Party-info
        {
            font-weight: bolder;
            font-family: sans-serif;
        }
        input[type=text]
        {
            width:257px;
            padding-left: 5px
        }
        textarea
        {
            padding-left: 5px;
            resize: none;
        }
        .data tr td
        {
            text-align: center;
        }
        .add_btn
        {
            background:#3bc930;color:white;border:none;padding:5px;border-radius:2px;font-size:14px;
        }
        .inp_wrd
        {
            width: 290px;
            margin-left: 80px;
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
        #myTable input[type=text]
        {
            width:150px;
        }
        #Text1
        {
            width:180px;
        }
          @media only screen and (max-width: 800px) and (min-width:500px)
         {
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
             .taxHeading,.B_name{font-size: 15px;text-align: center}
             #ownBusinessInfo{font-size:15px;}
              #partyInfo,#invoice_details,#gstCalc{font-size: 12px;}
             #total1{width:100px}
              input,textarea{border: 1px solid grey;}
             #total2{width:100px}
             #Text1{width:100px}
             label .inp_wrd{max-width:450px;}
             #bankD{font-size: 15px;}
               #myTab #qty_1,#hsn_sac_1,#total_1,#rate_1,#dis_1{width:220px;}
             #myTab #particular_1{width:250px;}
             
        }
         @media only screen and (max-width: 499px) and (min-width:320px)
         {
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
             .taxHeading,.B_name{font-size: 12px}
             #ownBusinessInfo{font-size:15px;}
             #partyInfo,#gstCalc{font-size: 11px;}
             #total1{width:100px}
             #total2{width:100px}
             input,textarea{border: 1px solid grey;}
             #Text1{width:100px}
             #invoice_details{font-size: 11px;}
             #gst_type1{width:60px;}
             #gst_type2{width:60px;}
             label .inp_wrd{max-width:319px;margin-left:0;}
             label{margin-left: 0;}
              #bankD{font-size: 12px;}
             #bankD input{max-width: 319px;}
             #partyInfo #p_inp1,#p_inp,#gstn,#sc,#note,#Branch{max-width:319px;}
              #invoice_details #invN,#inv_date{max-width: 319px}
            // #p_inp{max-width: 323px;}
             .signature {margin: auto;width:300px}
             #autocomplete_table{font-size: 12px;}
             #myTab #qty_1,#hsn_sac_1,#total_1,#rate_1,#dis_1{width:150px;}
             #myTab #particular_1{width:220px;}
        }    
          @media only screen and (max-width: 319px) and (min-width:200px)
         {
             .sitename1{font-size: 30px;padding-left: 19px;}
             .sitename2{font-size: 20px;padding-top: 7px}
             .copyright{font-size: 12px;}
             a{color: white;font-size: 12px;}
             .siteborder{width:85px;height:40px;margin-left: 1px}
             .taxHeading,.B_name{font-size: 12px}
               #invoice_details #invN,#inv_date{max-width: 200px}
              #invoice_details{font-size: 10px;}
             #ownBusinessInfo{font-size:15px;}
             #partyInfo,#gstCalc{font-size: 12px;}
             #total1{width:100px}
             #total2{width:100px}
             #Text1{width:100px}
              input,textarea{border: 1px solid grey;}
              #gst_type1{width:60px;}
             #gst_type2{width:60px;}
             label .inp_wrd{max-width:150px;margin-left:0;}
              #bankD{font-size: 10px;}
                 #partyInfo #p_inp1,#p_inp,#gstn,#sc,#note,#Branch{max-width:198px;}  
             #autocomplete_table{font-size: 12px;}
              #myTab #qty_1,#hsn_sac_1,#total_1,#rate_1,#dis_1{width:150px;}
             #myTab #particular_1{width:180px;}
              #bankD input{max-width: 198px;}
              #invoice_details #invN{max-width: 198px;}
              #invoice_details {font-size: 12px;}
             .signature {margin: auto;width:198px}
             .signature #sign{max-width: 170px;}
        }
       label .inp_wrd
        {
            width: 500px;
        }
        @media only screen and (max-width: 1400px) and (min-width:801px)
        {
           label{padding-left: 55px;}
            #bankD{margin-left: 56px;}
            .signature{float: right;}
        }
      .wrapper {
                text-align: center;
        }

    .butn {
        position: absolute;
        top: 1%;
    }
        #p_inp1{width: 257px}
        #note{width:257px}
        #Branch{width:257px}
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
      <!--Add the navbar-->
        <div class="container-fluid" style="//border:1px solid red;background:black">  
                <nav class="navbar navbar-expand-sm navbar-dark" style="background:black;//border:1px solid red">
                  
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                 <div class="collapse navbar-collapse" id="collapsibleNavbar" style="">
                   <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="welcome_c.php" style="float:right;margin-right:10px;padding:10px">Home</a>
                            
                       </li>
                       <li class="nav-item">
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
         <!--Add the Invoice Form--> 
       <div class="container-fluid" style="//border:1px solid blue;">
        <div class="row">
            <div class="col-md-12" style="background:#041e42;//min-height:50px;">
                <h2 class="B_name">
                    <?php
                        //echo"$user_id";
                        include("../conn/connection.php");          
                        $sql="select * from register where id='$user_id'";
                        $rs=mysqli_query($con,$sql);
                        $rec=mysqli_fetch_array($rs);
                        if($rec['b_name']!="")
                        {
                            $bsn_name=$rec['b_name'];
                            echo $bsn_name;
                        }
                        
                    ?>
                </h2>
                <h3 class="taxHeading">Tax Invoice</h3>
            </div>
            </div>
        <div class="row" style="margin-top:50px;//border:1px solid red;">
            <div class="col-md-12" style="">
                <table style="//margin-left:30px;margin-top:20px;//border:1px solid blue" cellpadding="3px" id="ownBusinessInfo">
                    <tr>
                        <th>Business Name </th>
                        <td width="20" align="center"> &#58; </td>
                        <td>
                            <?php
                                    include("../conn/connection.php");          
                                    $sql="select * from register where id='$user_id'";
                                    $rs=mysqli_query($con,$sql);
                                    $rec=mysqli_fetch_array($rs);
                                    if($rec['b_name']!="")
                                    {
                                        $bsn_name=$rec['b_name'];
                                        echo $bsn_name;
                                    }     
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>GSTIN No.</th>
                        <td width="20" align="center">&#58; </td>
                        <td id="demo">
                           <?php
                                    include("../conn/connection.php");          
                                    $sql="select * from register where id='$user_id'";
                                    $rs=mysqli_query($con,$sql);
                                    $rec=mysqli_fetch_array($rs);
                                    if($rec['b_name']!="")
                                    {
                                        $gstin=$rec['gstin'];
                                        echo "<span id='demo'>$gstin</span>";
                                    }
                            ?>
                        </td>
                    </tr>
                     <tr>
                        <th>Address</th>
                        <td width="20" align="center">&#58; </td>
                        <td>
                         <?php
                                    include("../conn/connection.php");          
                                    $sql="select * from register where id='$user_id'";
                                    $rs=mysqli_query($con,$sql);
                                    $rec=mysqli_fetch_array($rs);
                                    if($rec['b_name']!="")
                                    {
                                        $address=$rec['address'];
                                        echo $address;
                                    }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>State Code</th>
                        <td width="20" align="center">&#58; </td>
                        <td>
                            <?php
                                $state_code=substr($gstin,0,2);
                                echo $state_code;
                            ?>
                        </td>
                    </tr>
                </table>
            </div> 
        </div>    
    <form action="../action_files/success_Cinvoice.php" method="post">
        <div class="row" style="//border:1px solid black;margin-top:40px">
            <div class="col-md-6" style="//border:1px solid red;">
                <p style="padding-top:10px;color:#47484b;"><b><u>Party Details</u></b></p>
                 <table style="margin-top:5px;//border:1px solid blue"  cellpadding="3px" id="partyInfo">
                    <tr>
                        <th>Party Name</th>
                        <td width="38" align="right"> &#58; </td>
                        <td><input type="text" name="party_name" id="p_inp" required="required"></td>
                    </tr>
                    <tr>
                        <th>GSTIN No</th>
                        <td width="38" align="right">&#58; </td>
                        <td><input type="text" id="gstn" maxlength="15"  minlength="15"  name="gstin" onblur="autofill()" required="required"></td>
                    </tr>
                     <tr>
                        <th>Address</th>
                        <td width="38" align="right">&#58; </td>
                        <td><textarea  cols="" rows="" id="p_inp1" name="address"></textarea> </td>
                    </tr>
                    <tr>
                        <th>State Code</th>
                        <td width="38" align="right">&#58; </td>
                        <td><input type="text" id="sc" name="state_code"  readonly="readonly"></td>
                    </tr>
                     
                </table>
            </div> 
          
            <div class="col-md-6" style="//border:1px solid blue">
                <table class="" style="margin-top:50px;" align="right"  cellpadding="3px" id="invoice_details">
                    <tr>
                        <th>Invoice No</th>
                        <td> &#58; </td>
                        <td><input type="text" name="invoice_no" id="invN" required="required"></td>
                    </tr>
                    <tr>
                        <th  style="padding-top:8px">Invoice Date</th>
                        <td  style="padding-top:8px"> &#58;</td>
                        <td  style="padding-top:8px"><input type="date" id="inv_date" name="date"  required="required"></td>
                    </tr>
                </table>
            </div>       
        </div>
        <div class="row" style="margin-top:50px;//border:1px solid blue">
                <div class="col-md-12">
                   <div class="table-responsive">
                    <table  class="table autocomplete_table"  style="border:border-collapse;min-height:150px;//margin-left:20px" border="2" cellpadding="2px" id="autocomplete_table">
                       <thead class="thead-light">
                        <tr align="center">
                            <th>#</th>
                            <th>Particular</th>
                            <th>HSN/SAC</th>
                            <th>Qty.</th>
                            <th>Rate</th>
                            <th>Discount</th>
                            <th>Total</th>
                           </tr>
                        </thead>
                        <tbody id="myTab">
                            <tr align="center" id="row_1">
                                <td id="delete_1" scope="row" style="cursor:pointer">1<!--<br><i class="material-icons" style="color:#dc3545">remove_circle</i>--></td>
                                <td><input type="text" id="particular_1" data-type="particular1" name="particular[]" class="form-control autocomplete_txt" autocomplete="off" required="required"></td>
                                <td><input type="number" id="hsn_sac_1" data-type="hsn-sac1" name="hsnSac[]" class="form-control autocomplete_txt" autocomplete="off" required="required"></td>
                                <td><input type="number" onblur="findTotal(),Grandtotal(),NumToWord(grandSum.value,'divDisplayWords')" id="qty_1" data-type="qty1" name="qty[]" class="form-control autocomplete_txt" autocomplete="off" required="required"></td>
                                <td><input type="number" id="rate_1" data-type="rate1" name="rate[]" class="form-control autocomplete_txt" autocomplete="off" onblur="findTotal(),Grandtotal(),NumToWord(grandSum.value,'divDisplayWords')" required="required"></td>
                                <td><input type="number" id="dis_1" data-type="dis1" name="dis[]" class="form-control autocomplete_txt" autocomplete="off" onblur="findTotal(),Grandtotal(),NumToWord(grandSum.value,'divDisplayWords')" required="required"></td>
                                <td><input type="number" id="total_1" readonly data-type="total1" name="total[]" class="form-control autocomplete_txt" autocomplete="off" onblur="Grandtotal()" required="required"><input type="hidden" id="total_item" value="1"></td>
                            </tr>
                        </tbody>
                        
                    </table>
                       <p align="right"><b>Grand Total &#61;</b> <input type="number" id="grandSum" name="grandtotal" style="margin-right:5px;text-align:center;//border:none" readonly onmouseout="NumToWord(grandSum.value,'divDisplayWords')"></p>
                    </div>
                     <input type="button" id="add" value="Add More" class="add_btn">
                </div>
            </div>
         
            <div class="row"  >
                <div class="col-md-12">
                   <label for="inword" >In Words<input  type="text" class="inp_wrd" id="divDisplayWords"  readonly="readonly" name="inwords"></label>
            </div>
        </div>
            <div class="row" style="" onmouseover="NumToWord(grandSum.value,'divDisplayWords')">
                  <div class="col-md-12" style="//border:1px solid blue">
                   <hr width="95%" align="left" style="margin-left:50px">
                   <table cellspacing="10px" id="bankD">
                       <tr>
                           <th>Notes</th>
                           <td width="20px">&#58;</td>
                           <td><textarea  cols="" rows="" id="note" name="notes"></textarea></td>
                       </tr>
                       <tr>
                            <th>Bank Name</th>
                            <td width="20px">&#58;</td>
                            <td><input type="text" name="bank_name"></td>
                       </tr>
                        <tr>
                            <th>IFSC Code</th>
                            <td width="20px">&#58;</td>
                            <td><input type="text" name="ifsc"></td>
                       </tr>
                        <tr>
                            <th>Account No.</th>
                            <td width="20px">&#58;</td>
                            <td><input type="text" name="account"></td>
                       </tr>
                        <tr>
                            <th>Branch Name &amp;<br>Address</th>
                            <td width="20px">&#58;</td>
                            <td><textarea  cols="" rows="" id="Branch" name="branch"></textarea></td>
                       </tr>
                   </table>
                </div>
            </div>
            <div class="row" style="margin-top:50px">
               <div class="col-md-12" style="//border:1px solid red;">
                  <div class="signature" style="//border:1px solid blue;min-width:200px;text-align:center">
                   <p><input type="text" id="sign"  name="sign" style="width:;text-align:center;font-family:"><br><b><span>Authorised Sign</span></b></p>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="//border:1px solid red">
                   <div class="wrapper">
                    <button class="btn-success butn"  onmouseover="NumToWord(grandSum.value,'divDisplayWords')" type="submit" name="create" style="//margin:0px 0px 20px 550px;border:none;height:40px">Create Invoice</button>
                    <button type="reset" class="btn-danger" style="margin:0px 0px 0px 150px;border:none;height:40px;width:100px;">Reset</button>
                    </div>
                    
                </div>
            </div>
         </form>
         <!--Add the Footer-->
         <div class="row" style="margin-top:56px;">
        <div class="col-md-12" style="background:#041e42;">
            <h6 style="color:white;padding-top:10px" class="copyright"> &copy;2019 SPT Invoice</h6>
        </div>
    </div>
    </div>
    </body>
</html>
        
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/datepicker.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/regular.js"></script>
    
    

        <!--gstin upperCase and cut the state code-->
          <script>
                                               
              function autofill()
         {
              var gstin=document.getElementById('gstn').value;
              var uppergstn=gstin.toUpperCase();
                if(uppergstn.length != 15)
                 {
                    swal( "Oops" ,  "GSTIN is Not Valid Please Enter The Correct GSTIN No." ,  "error" );  
                 }
                else
                {
                  document.getElementById('gstn').value=uppergstn;
                  var state_code=uppergstn.substring(0,2);
                  document.getElementById('sc').value=state_code;
                }
         }
            </script>
    
    
    
    <script type="text/javascript">
             function findTotal()
        {
             var MyTab=document.getElementById('myTab');
             var rowCnt = MyTab.rows.length;
             var row;
                 for(row=1;row<=rowCnt;row++)
                 {
                     var qty=document.getElementById('qty_'+row).value;
                     var rate=document.getElementById('rate_'+row).value;
                     var dis=document.getElementById('dis_'+row).value;
                     var tot=(qty * rate) - dis;
                     document.getElementById('total_'+row).value=tot;
                 }
        }
            function Grandtotal()
         {
             var MyTab=document.getElementById('myTab');
             var rowCnt = MyTab.rows.length;
            var row;
             var GrandSum=0;
             var finalGrandSum;
                       for(row=1;row<=rowCnt;row++)
                                {
                                  var totalField= document.getElementById('total_'+row).value;
                                  var y = + totalField;   //convert a string to a number
                                  GrandSum=GrandSum + y;
                                }
                                finalGrandSum=Math.round(GrandSum);
                                document.getElementById('grandSum').value= finalGrandSum;
         }
    
</script>
  
  
  
  
<!--Add the Custom JS-->  
 <script>
     
   var SmartAuto = (function(){
   var addBtn,html,rowcount,tableBody;
    
   addBtn= $("#add"); 
   rowcount= $("#autocomplete_table tbody tr").length+1;
    tableBody= $("#autocomplete_table tbody");
    
    function formHtml(){
        
                            html  = '<tr align="center id="row_'+rowcount+'">';
                            html += '<td align="center" class="deleteRow" id="delete_'+rowcount+'" scope="row" style="cursor:pointer">'+rowcount+'</td>';
                            html += '<td>';
                            html += '<input type="text" id="particular_'+rowcount+'" data-type="particular'+rowcount+'" name="particular[]" class="form-control autocomplete_txt" autocomplete="off">';
                            html += '</td>';
                            html += '<td>';
                            html += '<input type="number" id="hsn_sac_'+rowcount+'" data-type="hsn-sac'+rowcount+'" name="hsnSac[]" class="form-control autocomplete_txt" autocomplete="off">';
                            html += '</td>';
                            html += '<td>';
                            html += '<input type="number" onfocusout="findTotal(),Grandtotal(),NumToWord(grandSum.value,divDisplayWords)" id="qty_'+rowcount+'" data-type="qty'+rowcount+'" name="qty[]" class="form-control  autocomplete_txt" autocomplete="off">';
                            html += '</td>';
                            html += '<td>';
                            html += '<input type="number" onblur="findTotal(),Grandtotal(),NumToWord(grandSum.value,divDisplayWords)" id="rate_'+rowcount+'" data-type="rate'+rowcount+'" name="rate[]" class="form-control autocomplete_txt" autocomplete="off">';
                            html += '</td>';
                            html += '<td>';
                            html += '<input type="number" onblur="findTotal(),Grandtotal(),NumToWord(grandSum.value,divDisplayWords)" id="dis_'+rowcount+'" data-type="dis'+rowcount+'" name="dis[]" class="form-control autocomplete_txt"   autocomplete="off">';
                            html += '</td>';
                            html += '<td>';
                            html += '<input type="number" readonly onfocusout="Grandtotal()" id="total_'+rowcount+'" data-type="total'+rowcount+'" name="total[]" class="form-control autocomplete_txt" autocomplete="off" >';
                            html += '</td>';
                            html += '</tr>';
                            rowcount++; 
                            return html;
        
    }
    
 
   /* function getId(element)
     {
             var id,idArr;
            id=element.attr('id');
            idArr = id.split('_');
            return idArr[idArr.length - 1];
    }*/
     function addNewRow(){
        tableBody.append(formHtml());
        
    }
    /*function deleteRow()
    {
        var currentEle,rowNo;
        currentEle = $(this);
        rowNo = getId(currentEle);
        $("#row_"+rowNo).remove();
    }
    */
   function registerEvents(){
       addBtn.on("click", addNewRow);
       
       //remove rows Expect first one
         /*  $("#myTab").on('click','.deleteRow',function(){
               var row_id=$(this).attr("id");
               $('#row_'+row_id).remove();
               rowcount=rowcount-1;
           });*/
   }
    
   function init(){
       registerEvents();
   }
   return{
       init : init
   };
})();

$(document).ready(function(){
   SmartAuto.init();
});
   
     
     
     
     
</script>