
<?php 
include_once('../db.php');
global $con;
    if(isset($_POST['addtocart'])){
        if(isset($_SESSION["userid"])){
    
            $ids = $_POST['item_id'];
            $prices = $_POST['item_price'];
            $quantity = $_POST['quantity'];
            
            for ($i=0; $i < sizeof($ids) ; $i++) { 
                if($quantity[$i] !== '' && $quantity[$i] > 0){
                    $userId = $_SESSION["userid"];
                    $id = $ids[$i];
                    $qty = $quantity[$i];
                    
                    $query = "insert into carts (user_id,item_id,quantity) values ('$userId','$id','$qty')";
                    // echo "<pre>";print_r($query);exit;
                    if (mysqli_query($con, $query)) {
                        $_SESSION["msg"] = "<div style='color:green'>Items are added to your cart</div>";
                        header("Location: index.php");
                    } else {
                        $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                    }
                    header("Location: ../index.php");
                }
            }
            exit;
        } else {
            $_SESSION["msg"] = "<div style='color:red'>Please login to show your cart</div>";
           header("Location: ../login.php");
           exit();
        }
        exit;
    }
?>