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
      
      
       // if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
       // $_SESSION["msg"]="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.
       // 	}else{// Captcha verification is Correct. Final Code Execute here!
       // 		$_SESSION["msg"]="<span style='color:green'>The Validation code has been matched.</span>";
       // 	}
      
       header("Location: index.php");
       exit;
   }