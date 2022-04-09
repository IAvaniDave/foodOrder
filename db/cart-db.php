
<?php 
include_once('../db.php');
global $con;
    if(isset($_POST['addtocart'])){
        if(isset($_SESSION["userid"])){
            $ids = $_POST['item_id'];
            $prices = $_POST['item_price'];
            $quantity = $_POST['quantity'];
            $restaurant = $_POST['restaurant_id'];
            
            for ($i=0; $i < sizeof($ids) ; $i++) { 
                $userId = $_SESSION["userid"];
                $price = $prices[$i];
                $id = $ids[$i];
                $qty = $quantity[$i];
                echo $quantity[$i];
                if($quantity[$i] !== '' && $quantity[$i] > 0){
                    $qr = "select count(*) as total from carts where user_id=".$userId." AND item_id=".$id." AND  restaurant_id=".$restaurant;
                    $upResult = $con->query($qr);
                    $data = mysqli_fetch_row($upResult)[0];
                    if ($data > 0) {
                        $query1 = "update carts set quantity=".$qty." where user_id=".$userId." AND item_id=".$id." AND restaurant_id=".$restaurant;
                        if (mysqli_query($con, $query1)) {
                            $_SESSION["msg"] = "<div style='color:green'>Items are added to your cart</div>";
                            header("Location: ../cart.php");
                        } else {
                            $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                            header("Location: ../index.php");
                        }
                    } else {
                        $query = "insert into carts (user_id,item_id,restaurant_id,quantity,price) values ('$userId','$id','$restaurant','$qty','$price')";
                        if (mysqli_query($con, $query)) {
                            $_SESSION["msg"] = "<div style='color:green'>Items are added to your cart</div>";
                            header("Location: ../cart.php");
                        } else {
                            $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                            header("Location: ../index.php");
                        }
                    }
                } else {
                    $qry = "delete from carts where item_id=".$id;
                    if (mysqli_query($con, $qry)) {
                        header("Location: ../cart.php");
                    } else {
                        $_SESSION["msg"] = "<div style='color:red'>Query Failed</div>";
                        header("Location: ../index.php");
                    }
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