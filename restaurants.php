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
                            <li><span class="rating <?php echo($row["rating"] <= 3.5 ? "law" : "high") ?>"><i class="fa fa-star" aria-hidden="true"></i>
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
            </div>
        </div>
    </div>
</div>
<?php
   include('footer.php');
?>