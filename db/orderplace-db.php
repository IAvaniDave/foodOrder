
<?php 
include_once('../db.php');
global $con;
    if(isset($_POST['place_order'])){
        if(isset($_SESSION["userid"])){
            $user = $_SESSION["userid"];
            $total = $_POST['total'];
            $query = 'select * from carts where user_id='.$user;
            $res = $con->query($query);
            $success = 0; 
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['item_id'];
                $restaurant = $row['restaurant_id']; 
                $price = $row['price']; 
                $qty = $row['quantity']; 
                $qry = "insert into orders (user_id,item_id,restaurant_id,total,price,quantity) values ('$user','$id','$restaurant', '$total', '$price','$qty')";
                // echo $qry;exit;
                if (mysqli_query($con, $qry)) {
                    $_SESSION["msg"] = "<div style='color:green'>Order has been placed.</div>";
                    $success = 1;
                    
                } else {
                    $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                }
            }
            if ($success) {
                $qr = "delete from carts where user_id=".$_SESSION['userid'];
                $res = $con->query($query);
                if (mysqli_query($con, $qr)) {
                } else {
                    $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                }
            }
            header("Location: ../index.php");
        } else {
            $_SESSION["msg"] = "<div style='color:red'>Please login to place an order</div>";
           header("Location: ../login.php");
           exit();
        }
        exit;
    }
?>