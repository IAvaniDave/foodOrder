<?php include_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Food Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="x-ua-compatible" content="IE=10">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap_theme.min.css">
    <link rel="stylesheet" href="css/fontawesome/styles.min.css">
    <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="css/fonts/fonts.css" rel="stylesheet">
    <!-- parallex effect   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/parallex.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- page animation section css start -->
    <link rel="stylesheet" href="css/animation.css">
    <link rel='stylesheet' href='css/aos.css'>
    <!-- animation css -->
    <!-- cursor animated -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/cursor.css">
    <link rel="stylesheet" href="css/megnatic_button.css">
    <!-- cursor animated -->
</head>

<body class="home_full_bg">

    <div class="full_page front-content position-relative">
        <div class="container">
            <div class="top_banner">
                <div class="row align-items-center top_row">
                    <div class="col-md-6">
                        <div class="row Primary_header pt-3">
                            <div class="col-6">
                                <div class="navbar-brand py-0">
                                    <a href="index.php" class="d-flex logo_heading">
                                        <img src="images/Food_order.png">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="btn_group header">
                                    <a class="btn_login" href="login.php">Login</a>
                                    <a class="btn_signup" href="#">signup</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            if (isset($_SESSION["msg"])) {
                                echo $_SESSION["msg"];
                                unset($_SESSION["msg"]);
                            }
                        ?>