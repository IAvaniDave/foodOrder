<?php
   if (isset($_POST["register"])) {
       global $con;
      
       $name = $_POST["name"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       $city = $_POST["city"];
       $phone = $_POST["phone"];
      
       // Check Already Exists
       $qry = "select * from users where email like '$email'";
       $res = mysqli_query($con, $qry);
      
       if (mysqli_num_rows($res)>0) {
           $_SESSION["msg"] = "<div style='color:red'>Email Address Already Exists</div>";
           header("Location:signup.php");
           die;
       }
      
       // Insert to Database
       $qry = "insert into users (name,email,password,contact,city)
       values('$name','$email','$password','$phone','$city')";
          
       if (mysqli_query($con, $qry)) {
           $_SESSION["msg"] = "<div style='color:green'>Register Successfully</div>";
       } else {
           $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
       }
      
       header("Location: index.php");
       exit;
   }