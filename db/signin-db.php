<?php
    if (isset($_POST["submit"])) {
        global $con;
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $qry = "select * from users where email like '$email' and password like '$password'";
        
        $res = mysqli_query($con, $qry)or die(mysqli_error($con));
        
        if (mysqli_num_rows($res)>0) {
            $row = mysqli_fetch_assoc($res);
            
            $_SESSION["userid"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            header("location:index.php");
            exit;
        } else {
            echo "<script>alert('Username/Password Invalid');location.href='index.php';</script>";
        }
    }