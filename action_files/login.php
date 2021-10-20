
   <?php
    session_start();
    if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['psw']))
    {
        $email=htmlentities($_POST['email']);
        $psw=htmlentities($_POST['psw']);
        if(!empty($email) && (!empty($psw)))
        {
            include("../conn/connection.php");
            $email_clean=mysqli_real_escape_string($con,$email);
            $psw_clean=mysqli_real_escape_string($con,$psw);
            //$new_psw=md5($psw_clean);
            $sql="select * from register where email='$email' and password='$psw_clean'";
            $rs=mysqli_query($con,$sql);
            $rec=mysqli_fetch_array($rs);
            if($rec['email']!="")
            {
                if($rec['scheme']=="Regular")
                {
                    $_SESSION['id']=$rec['id'];
                    $_SESSION['last_login_timestamp']=time();
                    header("location:../files/welcome_r.php");
                }
                else if($rec['scheme']=="Composition")
                {
                    $_SESSION['id']=$rec['id'];
                    $_SESSION['last_login_timestamp']=time();
                    header("location:../files/welcome_c.php");
                }
            }
            else
            {
                $_SESSION['wrong_psw']=$_POST['psw'];
                header("location:../files/error_login.php");
            }
        }
        else
        {
            
            echo"Please Fill All The Fields";
        }
    }
?>