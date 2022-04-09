<?php include_once('header.php'); 
    if(!isset($_SESSION['userid'])){
        header("Location: index.php");
    }
?>
<div class="page_content">
    <div class="my_cart my-5">
        <div class="container">
            <div class="cart_block_heading">
                <h6 class="m-0">Cart</h6>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                <?php
                    global $con;
                    $qry = "SELECT *,
                    items.name as item,
                    items.quantity as qtgms,
                    restaurants.name as restaurant
                    FROM items
                    LEFT JOIN carts ON items.id = carts.item_id
                    LEFT JOIN restaurants ON items.restaurant_id = restaurants.id
                    WHERE carts.user_id=".$_SESSION['userid'];
                    $res = $con->query($qry);
                    $subtotal = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        $subtotal += $row['price'] * $row['quantity'];
                ?>
                    <div class="footer_listing_block">
                    <?php 
                        if($subtotal > 0){ 
                    ?>
                        <div class="food_block">
                            <span class="food_type icon_veg"></span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="food_name mt-3  mb-2 d-flex">
                                        <h4 class="item-name"><?php echo $row['item']; ?></h4>
                                        <p class="pl-2 m-0 font-black"> (<?php echo $row['qtgms']; ?> Gm)</p>
                                    </div>
                                    <p class="m-0 font-black">From :<a href="detail.php?id=<?php echo $row['restaurant_id']; ?>"> <?php echo $row['restaurant']; ?></a></p>
                                    <p class="m-0 text-black">Price :<i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['price']; ?></p>
                                    <p class="m-0 text-black">Quantiy :<?php echo $row['quantity']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i>
                                    <?php echo $row['price'] * $row['quantity']; ?></p>
                                </div>
                            </div>
                        </div>
                     <?php
                        }
                    ?>
                    </div>
                <?php
                    }
                ?>
                    <?php 
                        if($subtotal <= 0){ 
                    ?>
                        <p>No items found.</p>
                    <?php } ?>
                    <?php 
                        if($subtotal > 0){ 
                    ?>
                        <div class="cart_footer">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="mb-0">Subtotal</h5>
                                    <span class="font-small">Extra charges may apply</span>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="total-price"><i class="fa fa-inr" aria-hidden="true"></i>
                                        <?php echo($subtotal); ?></h5>
                                </div>
                            </div>
                            <form action="./db/orderplace-db.php" method="post">
                                <input type="hidden" name="total" value="<?php echo($subtotal); ?>">
                                <button class="place_order food_btn" type="submit" name="place_order">
                                    Place your order
                                    <img src="images/btn_icon.png" class="btn-arrow">
                                </button>
                            </form>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>