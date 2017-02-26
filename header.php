<!doctype html>
<html>
    <head>
        <title>SIPOz</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--<link href="css/styleMobile.css" rel="stylesheet" type="text/css">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/functions.css" rel="stylesheet" type="text/css">
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="css/menu.css" rel="stylesheet" type="text/css">
        <link href="css/styleLogin.css" rel="stylesheet" type="text/css">-->
        <script src="js/menu.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script src="js/functions.js" type="text/javascript"></script>
    </head>
<body>
    <div id="header">
        <div class="container center_div">
            <div class="page-header"><img alt="Brand" src="images/sipozLogo.png">
                <span class="text-left">
                <?php 
                    if (!empty($_SESSION["sipoz_user_username"])) {
                    $user = ", " . $_SESSION["sipoz_user_username"];
                ?>
                </span>
                <div style="float: right;">
                        <h3 class="text-primary">
                            <br>
                            <br>
                            <br>
                            <b><i><span class="text-center">         
                                <?php echo "Welcome" . $user; ?><?php }
                                    $user = "";
                                    if (!empty($_REQUEST["logout"])) {
                                    session_destroy();
                                    header('Location: home.php'); }
                                ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span></i></b></h3>
                    </div>
            </div>
        </div>
        <div class="container center_div">
           <?php
            $qty = countCartQty();
            ?>
            <div style="float: right;"><a href="home.php?page=shoppingCart"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<span id="cartQty">Cart (<?php echo $qty; ?>)</span></a></div>
        </div>
        
            <!--!<a href="menu.php">
          <span class="glyphicon glyphicon-list"></span>
        </a>
                
    <div class="logout"><h3 style = "font-family:Arial; color:blue">//<?php echo "LogOut" . $user; ?><!--</h3></div>--> 
            
       
    <?php require_once ('menu.php');
    
            
    
    
    