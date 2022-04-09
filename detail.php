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
    <?php 
        $IsCartItems = 0;
    ?>
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

                                $qry = "SELECT *,
                                items.name as item,
                                items.price as price,
                                items.id as id
                                FROM items
                                LEFT JOIN carts ON items.id = carts.item_id
                                WHERE items.restaurant_id=".$_GET["id"];
                                $res = $con->query($qry);
                                while ($row = mysqli_fetch_array($res)) { 
                                    if(isset($row['item_id']) && isset($row['quantity']) && $row['item_id'] !== '' && $row['quantity'] !== '') {
                                        $IsCartItems = 1;
                                    }
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
                                            <div class="add_item <?php echo( (isset($row['item_id']) && isset($row['quantity'])) ? "show-quntity" : "111") ?>">
                                                <div class="quantity">
                                                    <input type='hidden' value='<?php echo $_GET["id"]; ?>' class='restaurant_id' name="restaurant_id" />
                                                    <input type='hidden' value='<?php echo $row['id']; ?>' class='item_id' name="item_id[]" />
                                                    <input type='hidden' value='<?php echo $row['price']; ?>'
                                                        class='item_price' name="item_price[]" />
                                                    <input type='button' value='-' class='qtyminus' field='quantity' />
                                                    <?php if(isset($row['item_id']) && isset($row['quantity']) && $row['item_id'] !== '' && $row['quantity'] !== '') { ?>
                                                        <input type='text' name='quantity[]' value='<?php echo($row['quantity']) ?>' class='qty' />
                                                    <?php } else{ ?>
                                                        <input type='text' name='quantity[]' value='' class='qty' />
                                                    <?php } ?>
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
                            <div class="go-to-cart <?php echo($IsCartItems ? 'd-block' : 'd-none') ?>">
                                <button class="cart-btn food_btn" type="submit" name="addtocart">
                                    Go TO Cart
                                    <img src="images/btn_icon.png" class="btn-arrow">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>