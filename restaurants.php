<?php
   include('header.php');
?>
<div class="page_content">
    <div class="bredcrumb section-spacer">
        <div class="container">
            <div class="section_heading">
                <h3>Popular <span class="text_orenge">restaurants</span></h3>
            </div>
        </div>
    </div>
    <div class="res_listing my-5">
        <div class="container">
            <div class="row">
                <?php
                  global $con;
                  $qry = "select * from restaurants";
                  $res = $con->query($qry);
                  while ($row = mysqli_fetch_array($res)) {
                      ?>
                <div class="col-3 my-2">
                    <a href="detail.php?id=<?php echo $row["id"]; ?>" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/<?php echo $row["photo"]; ?>">
                        </div>
                        <div class="block_content">
                            <h6><?php echo $row["name"]; ?></h6>
                            <p>North Indian, Chinese, Indian, Street Food, Continental</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i>
                                    <?php echo $row["rating"]; ?></span>
                            </li>
                            <li class="time text-uppercase"><?php echo $row["delivery_time"]; ?> min</li>
                            <li class="price">₹<?php echo $row["minimum_order"]; ?> FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p><?php echo $row["offer_percentage"]; ?>% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <?php
                  }
               ?>
                <!-- <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-6.webp">
                        </div>
                        <div class="block_content">
                            <h6>Shakti - The Sandwich Shop</h6>
                            <p>Combo, Snacks, Pizzas</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹250 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-7.webp">
                        </div>
                        <div class="block_content">
                            <h6>Mahalaxmi Pav Bhaji</h6>
                            <p>North Indian</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹250 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-8.webp">
                        </div>
                        <div class="block_content">
                            <h6>Jain Dal Bati</h6>
                            <p>Rajasthani, Punjabi, Combo, Desserts, North Indian, Beverages</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹250 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-1.webp">
                        </div>
                        <div class="block_content">
                            <h6>KFC</h6>
                            <p>American, Snacks, Biryani</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating law"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹400 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-2.webp">
                        </div>
                        <div class="block_content">
                            <h6>Fire On Wheels</h6>
                            <p>Indian</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹400 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-3.webp">
                        </div>
                        <div class="block_content">
                            <h6>Shakti - The Sandwich Shop</h6>
                            <p>Combo, Snacks, Pizzas</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating law"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹250 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 my-2">
                    <a href="detail.php" class="listing_block d-block">
                        <div class="img_block">
                            <img src="images/restaurant/item-4.webp">
                        </div>
                        <div class="block_content">
                            <h6>Sugarless Life</h6>
                            <p>Desserts, Sweets</p>
                        </div>
                        <ul class="list px-0 d-flex">
                            <li><span class="rating high"><i class="fa fa-star" aria-hidden="true"></i> 3.7</span>
                            </li>
                            <li class="time text-uppercase">37 min</li>
                            <li class="price">₹250 FOR TWO</li>
                        </ul>
                        <div class="list_footer">
                            <p>20% off | Use TRYNEWs</p>
                            <span class="quick_view text-uppercase">quick view</span>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php
   include('footer.php');
?>