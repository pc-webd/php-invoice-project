<?php
    session_start();
    $user_id=$_SESSION['id'];
    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $pdf= new Dompdf();
    if(isset($_GET["pdf"]) && isset($_GET["id"]))
       {
           
           $connect=new PDO('mysql:host=localhost;dbname=spt_invoice','root','');
           $output='';
            $statement=$connect->prepare("
                SELECT * FROM register WHERE id=:user_id
            ");
            $statement->execute(
                    array(
                            ':user_id'           =>    $user_id
                    )
            );
            $rs=$statement->fetchAll();
           $statement=$connect->prepare("
              SELECT * FROM invoice_data WHERE order_id=:order_id
              LIMIT 1
           ");
            $statement->execute(
                    array(
                            ':order_id'           =>    $_GET["id"]
                    )
            );
            $result=$statement->fetchAll();
            foreach($result as $row)
            {
                $output .='
                        <html lang="en">
                        <head>
                            <style>
                               .para{color:white;text-align:center;padding-top:10px;padding-bottom:10px;font-size:25px;}
                            </style>
                        </head>
                        <body>
                            <div class="container-fluid" style="//border:1px solid grey">';
                            foreach($rs as $rec){
                                $output .=' <div class="row" style="">
                                    <div class="col-md-12" style="background:#041e42;color:white;">
                                        <p class="para">'.$rec["b_name"].'<br><span style="font-size:18px">Tax Invoice</span></p>
                                    </div>
                                </div>
                    
                                <div class="row" style="//border:1px solid red">
                                    <div class="col-md-12">
                                        <table>
                                            <tr>
                                                <th>Business Name</th>
                                                <td>&nbsp;</td>
                                                <td>'.$rec["b_name"].'</td>
                                            </tr>
                                            <tr>
                                                <th>GSTIN No.</th>
                                                <td>&nbsp;</td>
                                                <td>'.$rec["gstin"].'</td>
                                            </tr>
                                            <tr>
                                                 <th>Address</th>
                                                 <td>&nbsp;</td>
                                                 <td>'.$rec["address"].'</td>
                                            </tr>';
                                $gstin=$rec["gstin"];
                                $state_code=substr($gstin,0,2);
                                      $output .='
                                            <tr>
                                                 <th>State Code</th>
                                                 <td>&nbsp;</td>
                                                <td>'.$state_code.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>';
                    }
                            $output .=' <div class="row" style="//border:1px solid red">
                                    <div class="col-md-6" style="margin-top:40px;//border:1px solid red;width:70%;display:inline-block">
                                        <u>Party Details</u>
                                        <table cellpadding="2px" style="margin-top:10px">
                                             <tr>
                                                <th>Party Name</th>
                                                <td>&nbsp;</td>
                                                <td>'.$row["party_name"].'</td>
                                            </tr>
                                            <tr>
                                                <th>GSTIN No.</th>
                                                <td>&nbsp;</td>
                                                 <td>'.$row["gstin"].'</td>
                                            </tr>
                                            <tr>
                                                 <th>Address</th>
                                                <td>&nbsp;</td>
                                                 <td>'.$row["address"].'</td>
                                            </tr>
                                              <tr>
                                                 <th>State Code</th>
                                                <td>&nbsp;</td>
                                                 <td>'.$row["state_code"].'</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6" style="//margin-top:26px;//border:1px solid blue;width:28%;float:right">
                                        <table>
                                            <tr>
                                                <th>Invoice No.</th>
                                                 <td>&nbsp;&nbsp;</td>
                                                 <td>&nbsp;'.$row["invoice_no"].'</td>
                                            </tr>
                                             <tr>
                                                <th>Invoice Date</th>
                                                 <td>&nbsp;&nbsp;</td>
                                                 <td>&nbsp;'.$row["invoice_dt"].'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="item_row" style="//border:1px solid blue">
                                    <table  style="border-collapse:collapse;border-bottom:none;border-left:none;" cellpadding="10px" border="1" width="100%">
                                        <thead style="text-align:center">
                                            <tr>
                                                <th>#</th>
                                                <th>Particular</th>
                                                <th>HSN/SAC</th>
                                                <th>Qty</th>
                                                <th>Rate</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>';
                
                         $statement=$connect->prepare("
                          SELECT * FROM invoice_item WHERE order_id=:order_id
                        
                       ");
                        $statement->execute(
                                array(
                                        ':order_id'           =>    $_GET["id"]
                                )
                        );
                        $item_result=$statement->fetchAll();
                        $count=0;
                        foreach($item_result as $sub_row)
                        {
                            $count++;
                            $output .='
                                    <tbody style="text-align:center">
                                            <tr>
                                                <td>'.$count.'</td>
                                                <td>'.$sub_row["particular"].'</td>
                                                <td>'.$sub_row["hsnSac"].'</td>
                                                <td>'.$sub_row["qty"].'</td>
                                                <td>'.$sub_row["rate"].'</td>
                                                <td>'.$sub_row["discount"].'</td>
                                                <td>'.$sub_row["total"].'</td>
                                            </tr>
                                    
                                    ';
                        }
                        
                        
                                $output .='
                                            <tr style="text-align:center">
                                                <td colspan="5" style="border:none;"></td>
                                                <th>Grandtotal</th>
                                                <td>'.$row["grandtotal"].'</td>
                                            </tr>';
                        if(($row["gst_type1"]!="") && ($row["gst_rate1"]!=""))
                        {
                                 $output.='
                                            <tr style="text-align:center">
                                                <td colspan="5" style="border:none;"></td>
                                                <td>'.$row["gst_type1"].' ( '.$row["gst_rate1"].' &#37;)</td>
                                                <td>'.$row["total_1"].'</td>
                                            </tr>';
                                if(($row["gst_type2"]!="") && ($row["gst_rate2"]!=""))
                                {
                                     $output.='
                                            <tr style="text-align:center">
                                                <td colspan="5" style="border:none;"></td>
                                                <td>'.$row["gst_type2"].' ( '.$row["gst_rate2"].' &#37;)</td>
                                                <td>'.$row["total_2"].'</td>
                                            </tr>';
                                }
                        }
                        if($row["finaltotal"]!="")
                        {
                             $output.='
                                        <tr style="text-align:center">
                                            <td colspan="5" style="border:none;"></td>
                                            <th>Total</th>
                                            <td>'.$row["finaltotal"].'</td>
                                        </tr>';
                        }
                        $output.='
                                        </tbody>
                                    </table>
                                </div>
                                <table border="" style="border:1px solid black;margin-top:10px" cellspacing="5px">
                                    <tr>
                                        <th>In Words :</th>  
                                        <td>'.$row["inwords"].'</td>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row" style="margin-top:30px">
                                <table>
                            ';
                        if($row["notes"]!=""){
                            $output .='   
                                        <tr>
                                            <th>Notes</th>
                                             <td>&nbsp;</td>
                                            <td>'.$row["notes"].'</td>
                                        </tr>
                                    ';
                            }  
                         if($row["bank_name"]!=""){
                            $output .='   
                                        <tr>
                                            <th>Bank Name</th>
                                            <td>&nbsp;</td>
                                            <td>'.$row["bank_name"].'</td>
                                        </tr>
                                        <tr>
                                            <th>IFSC</th>
                                            <td>&nbsp;</td>
                                            <td>'.$row["ifsc"].'</td>
                                        </tr>
                                        <tr>
                                            <th>Account</th>
                                            <td>&nbsp;</td>
                                            <td>'.$row["account"].'</td>
                                        </tr>
                                        <tr>
                                            <th>Branch &<br> Address</th>
                                            <td>&nbsp;</td>
                                            <td>'.$row["branch"].'</td>
                                        </tr>
                                    ';
                            }  
                        $output .='
                                </table> 
                                </div>
                                <div class="row">
                                  
                                   <p align="right"> <span style=""><i>Ankit Chauhan</i></span><br>
                                    <b>Authorised Signature</b></p>
                                </div>
                            </div>
                        </body>
                    </html>
                ';
            }
        } 
   //  $output='';
     
    $filename='Invoice-'.$row["invoice_no"].'.pdf';
    $pdf->loadHtml($output);
    $pdf->setPaper('A4','portrait');
    $pdf->render();
    $pdf->stream($filename, array("Attachment"=> 1));
       
?>