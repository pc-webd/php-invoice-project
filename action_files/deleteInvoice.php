<?php
    session_start();
    $user_id=$_SESSION['id'];
    include("../conn/connection.php");
    $id=$_GET['id'];
    $sql1="delete from invoice_data where order_id='$id'";
    $sql2="delete from invoice_item where order_id='$id'";
    if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2))
    {
        $sql3="select * from register where id='$user_id'";
        $rs=mysqli_query($con,$sql3);
        $rec=mysqli_fetch_array($rs);
        if($rec['scheme']=='Regular')
        {
            header("location:../files/view_Rinvoices.php");
        }
        elseif($rec['scheme']=='Composition')
        {
            header("location:../files/view_Cinvoices.php");
        }
    }
    else
    {
        echo"Not Ok";
    }
?>