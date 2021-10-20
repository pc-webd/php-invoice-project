<?php
    session_start();
    $user_id=$_SESSION['id'];
    include(../conn/connection.php);
    $sql="select * from register where id='$user_id' ";
    $rs=mysqli_query($con,$sql);
    $rec=mysqli_fetch_array($rs);
    if($rec['scheme']=="Regular")
    {
        header("location:print_regular_inv.php");
    }
    elseif($rec['scheme']=="Composition")
    {
        header("location:print_composition_inv.php")
    }
?>