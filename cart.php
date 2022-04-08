<?php include_once('header.php'); ?>
<div class="page_content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
                global $con;
                $qry = "select s.*,c.id as item from carts s left join items c on s.item_id=c.id where user_id=2";
                // .$_SESSION['user_id'];
                // $qry = "select * from carts where user_id=".$_SESSION['user_id']. "(select * from items where)";
                $res = $con->query($qry);
                // echo "<pre>";print_r($res);exit;
                while ($row = mysqli_fetch_array($res)) {
            ?>
                <div class="footer_listing_block">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img_block">
                                <img src="images/restaurant/<?php echo $row["photo"]; ?>" class="w-100">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="flex_block_content">
                                <h6 class="text-white"><?php echo $row["name"]; ?></h6>
                                <div class="center_block my-3">
                                    <p class="category m-0 text-white">Rajasthani, Punjabi</p>
                                    <p class="add m-0 text-white"><?php echo $row["city"]; ?></p>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="bg-transparent"><i class="fa fa-star" aria-hidden="true"></i>
                                            <?php echo $row["rating"]; ?></span>
                                        <?php if (isset($row["rating_count"]) && !is_null($row["rating_count"])) {?>
                                        <p class="text-white font-small p-0"><?php echo $row["rating_count"]; ?>+
                                            Ratings</p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                        <span><?php echo $row["delivery_time"]; ?> min</span>
                                        <p class="text-white font-small">Delivery Time</p>
                                    </div>
                                    <div class="col-md-3">
                                        <span>₹<?php echo $row["minimum_order"]; ?> </span>
                                        <p class="text-white font-small">cost For Two</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
            <div class="col-md-4">
                <div class="cart_block">
                    <div class="cart_block_heading">
                        <h6 class="m-0">Cart</h6>
                        <span class="no_of_item">2 ITEMS</span>
                    </div>
                    <ul class="item_detil d-flex p-0">
                        <li class="d-flex"><span class="food_type icon_veg"></span>
                            <p class="food_name text-black m-0">Idli (2pc)</p>
                        </li>
                        <li>
                            <div class="quantity d-flex position-relative">
                                <input type='hidden' value='' class='cart_item_id' />
                                <input type='button' value='-' class='qtyminus' field='quantity' />
                                <input type='text' name='quantity' value='1' class='qty' />
                                <input type='button' value='+' class='qtyplus' field='quantity' />
                            </div>
                        </li>
                        <li>
                            <p class="mb-0 text-black">
                                <i class="fa fa-inr" aria-hidden="true"></i>
                                <span class="food_price">59</span>
                            </p>
                        </li>
                    </ul>
                    <div class="cart_footer">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-0">Subtotal</h5>
                                <span class="font-small">Extra charges may apply</span>
                            </div>
                            <div class="col-md-6">
                                <h5 class="total-price text-right"><i class="fa fa-inr" aria-hidden="true"></i>
                                    ₹ 1760</h5>
                            </div>
                        </div>
                    </div>
                    <a href="checkout.php" class="btn_checkout"> Checkout <span class="px-2">→</span></a>
                </div>
                <div class="cart_empaty">
                    <div class="cart_block_heading">
                        <h6 class="m-0">Cart Empty</h6>
                    </div>
                    <div class="img_block">
                        <img src="images/Cart_empty.webp" class="w-100">
                    </div>
                    <p>Good food is always cooking! Go ahead, order some yummy items from the menu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>