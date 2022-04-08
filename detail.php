<?php include_once('header.php'); ?>
<div class="page_content">
    <div class="bredcrumb detail section-spacer" style="    background-image: url(images/UI_Ux_bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                     global $con;

                     $qry = "select * from restaurants where id=".$_GET["id"];
                     $res = $con->query($qry);
                     $row = mysqli_fetch_array($res);
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
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
    <div class="food_listing my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="scrollable_listing">
                        <form action="./db/cart-db.php" method="post">
                        <?php
                            global $con;

                            $qry = "SELECT count(*) as total from items WHERE restaurant_id=".$_GET["id"];
                            $res = $con->query($qry);
                            $data = mysqli_fetch_array($res)  
                        ?>
                            <div class="food_heading mb-5">
                                <h5>Combos</h5>
                                <?php if ($data['total'] <= 0) { ?>
                                <p>No items found.</p>
                                <?php } else { ?>
                                <p><?php echo $data['total']; ?> items</p>
                                <?php } ?>
                            </div>
                        <?php
                            global $con;

                            $qry = "select * from items where restaurant_id=".$_GET["id"];
                            $res = $con->query($qry);
                            while ($row = mysqli_fetch_array($res)) { 
                        ?>
                            <div class="food_block">
                                <span class="food_type icon_veg"></span>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="food_name mt-3  mb-2 d-flex">
                                            <h4 class="item-name"><?php echo $row['name']; ?>
                                            </h4>
                                            <p class="pl-2 m-0 font-black"> (<?php echo $row['quantity']; ?> Gm)</p>
                                        </div>
                                        <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i>
                                            <?php echo $row['price']; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="add_item">
                                            <div class="quantity">
                                                <input type='hidden' value='<?php echo $row['id']; ?>' class='item_id' name="item_id[]" />
                                                <input type='hidden' value='<?php echo $row['price']; ?>'
                                                    class='item_price' name="item_price[]" />
                                                <input type='button' value='-' class='qtyminus' field='quantity' />
                                                <input type='text' name='quantity[]' value='' class='qty' />
                                                <input type='button' value='+' class='qtyplus' field='quantity' />
                                            </div>
                                            <button class="add-btn" type="button">
                                                ADD
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="go-to-cart d-none">
                                <button class="cart-btn food_btn" type="submit" name="addtocart">
                                    Go TO Cart
                                    <img src="images/btn_icon.png" class="btn-arrow">
                                </button>
                            </div>
                        </form>
                        <!-- <div class="food_block">
                            <span class="food_type icon_veg"></span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="food_name mt-3  mb-2">
                                        <h4 class="">Rajwadi Undhiyu (500 Gm)</h4>
                                    </div>
                                    <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i> 59</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="add_item">
                                        <div class="quantity">
                                            <input type='button' value='-' class='qtyminus' field='quantity' />
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <input type='button' value='+' class='qtyplus' field='quantity' />
                                        </div>
                                        <button class="add-btn" type="button">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="food_block">
                            <span class="food_type icon_veg"></span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="food_name mt-3  mb-2">
                                        <h4 class="">Rajwadi Undhiyu (500 Gm)</h4>
                                    </div>
                                    <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i> 59</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="add_item">
                                        <div class="quantity">
                                            <input type='button' value='-' class='qtyminus' field='quantity' />
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <input type='button' value='+' class='qtyplus' field='quantity' />
                                        </div>
                                        <button class="add-btn" type="button">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="food_block">
                            <span class="food_type icon_veg"></span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="food_name mt-3  mb-2">
                                        <h4 class="">Rajwadi Undhiyu (500 Gm)</h4>
                                    </div>
                                    <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i> 59</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="add_item">
                                        <div class="quantity">
                                            <input type='button' value='-' class='qtyminus' field='quantity' />
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <input type='button' value='+' class='qtyplus' field='quantity' />
                                        </div>
                                        <button class="add-btn" type="button">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="food_block">
                            <span class="food_type icon_veg"></span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="food_name mt-3  mb-2">
                                        <h4 class="">Rajwadi Undhiyu (500 Gm)</h4>
                                    </div>
                                    <p class="mb-0 price"><i class="fa fa-inr" aria-hidden="true"></i> 59</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="add_item">
                                        <div class="quantity">
                                            <input type='button' value='-' class='qtyminus' field='quantity' />
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <input type='button' value='+' class='qtyplus' field='quantity' />
                                        </div>
                                        <button class="add-btn" type="button">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="col-md-4">
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
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>