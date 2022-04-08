<?php
   include('header.php');
?>
<div class="page_content">
    <?php
      if (isset($_SESSION["msg"])) {
          echo $_SESSION["msg"];
          unset($_SESSION["msg"]);
      }
   ?>
    <div class="full_page front-content position-relative home_banner top_banner">
        <div class="container">
            <img src="images/split_shape_5.png" class="shape_login_1">
            <div class="row align-items-center">
                <div class="col-8 col-lg-6">
                    <div class="block_content mt-5">
                        <span>Welcome to Food Order</span>
                        <h1>Ordering Food Simplified!</h1>
                        <div class="n-content">
                            <p>With Monyoo, your customers can place an order right from their phone.
                                No App installation required. No more printed menus.</p>
                        </div>
                        <div class="content_footer mt-4">
                            <a class="food_btn" href="restaurants.php">Find Food <img src="images/btn_icon.png"
                                    class="btn-arrow"></a>
                        </div>

                    </div>
                </div>
                <div class="col-4 col-lg-6">
                    <div class="banner_img_block">
                        <img src="images/slide3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section_offer section-spacer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="offer_block left position-relative h-100">
                        <a class="food_btn" href="#">Order Now <img src="images/btn_icon.png" class="btn-arrow"></a>
                        <img src="images/offer-pro_1.png" class="ab_img">
                        <div class="offer_img_block position-relative">
                            <img src="images/offer-banner_1.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="offer_block left position-relative ">
                        <a class="food_btn" href="#">Order Now <img src="images/btn_icon.png" class="btn-arrow"></a>
                        <img src="images/offer-pro_2.png" class="ab_img">
                        <div class="offer_img_block position-relative">
                            <img src="images/offer-banner_2.jpg">
                        </div>
                    </div>
                    <div class="offer_block left position-relative mt-3 mt-lg-4">
                        <a class="food_btn" href="#">Order Now <img src="images/btn_icon.png" class="btn-arrow"></a>
                        <img src="images/offer-pro_3.png" class="ab_img">
                        <div class="offer_img_block position-relative">
                            <img src="images/offer-banner_3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="suitable section-spacer">
        <div class="container">
            <div class="section_heading text-center mb-5">
                <h3>Best <span class="text_orenge">Suitable For</span></h3>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="img_block">
                        <img src="images/testimonial-client.png" class="w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="suitable_block mb-4">
                        <div class="img_block">
                            <img src="images/icon/restaurant.png">
                        </div>
                        <div class="left_content ml-3">
                            <div class="block_header">
                                <h4 class="text-left">Restaurants</h4>
                            </div>
                            <div class="block_content">
                                <p>Monyoo makes the experience of your restaurant much easier and more productive. It
                                    will add much value and saves most of your time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="suitable_block mb-4">
                        <div class="img_block">
                            <img src="images/icon/hotel.png">
                        </div>
                        <div class="left_content ml-3">
                            <div class="block_header">
                                <h4 class="text-left">Hotels</h4>
                            </div>
                            <div class="block_content">
                                <p>Your hotel clients will have the privilege of choosing their own meals from the
                                    comfort of their rooms by using their QR codes. It will increase your food demand
                                    and make your clients happier.</p>
                            </div>
                        </div>
                    </div>
                    <div class="suitable_block mb-4">
                        <div class="img_block">
                            <img src="images/icon/food.png">
                        </div>
                        <div class="left_content ml-3">
                            <div class="block_header">
                                <h4 class="text-left">Food Take Away</h4>
                            </div>
                            <div class="block_content">
                                <p>Customers can buy food without the need to contact your restaurant directly. By using
                                    QR codes, they can order it anytime or directly take it without the need of any
                                    employees.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="call_action section-spacer position-relative">
        <div class="container">
            <div class="call_action_block">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="img_group">
                            <img src="images/online_food.png" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="block_content px-4">
                            <h5 class="">Get Free <span class="text_orenge">Delivery!</span></h5>
                            <p class="">As well known and we are very busy all days beforeso we can guarantee your seat.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a class="food_btn call" href="+123666604">
                            <img src="images/icon/call.png" class="mx-2">Call: +123666604 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
   include('footer.php');
?>