<?php
    //Start session
    session_start();
    require_once ('functions.php');
    require_once ('header.php');
?>
       <?php
        
        if (empty ($_REQUEST['page'])) {
        ?>
<div class="container center_div">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators--> 
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
        </ol>
        <!-- Wrapper for slides --> 
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/sipozbanner2.png" alt="sipoz">
                <div class="carousel-caption">
                *********************   
                </div>
            </div>      
            <div class="item">
                <img src="images/sipozLogo.png" alt="sipoz">
                <div class="carousel-caption">
                *********************   
                </div>
            </div>
            <div class="item">
                <img src="images/sipoz4.jpg" alt="sipoz">
                <div class="carousel-caption">
                *********************   
                </div>
            </div>
        </div>
        <!-- Controls -->
            <a class="carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
            <br>
            <br>
            <br>
            
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <br>
                <img src="images/2.jpg" alt="home">
                <div class="caption">
                    <h3>Maintenance</h3>
                    <p>***********</p>
                    <p><a href="home.php?page=catalogue.php" class="btn btn-primary" role="button">Button</a></p>
                </div>
            </div>
        </div>
    
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <br>
                <img src="images/sipoz5.jpg" alt="home">
                <div class="caption">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h3>Computers</h3>
                    <p>*************</p>
                    <p><a href="home.php?page=catalogue.php" class="btn btn-primary" role="button">Button</a></p>
                </div>
            </div>
        </div>
    
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <br>
                <img src="images/sipoz7.jpg" alt="home">
                <div class="caption">
                    <br>
                    <br>
                    <br>
                    <h3>Connection</h3>
                    <p>*************</p>
                    <p><a href="home.php?page=catalogue.php" class="btn btn-primary" role="button">Button</a></p>
                </div>
            </div>
        </div>
    </div>

        <?php
            
        } else if (!empty($_REQUEST["page"])) {
            if ($_REQUEST["page"] === 'stock') {
                ?>
                <div id='content' class="center">
                    <div class="container center_div">
                        
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="text-center">
                                    <h2 class="panel-title-texte"><?php echo "Stock Managment"; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <br>
                <br>
                
                <?php
            }
            if ($_REQUEST["page"] === 'myAccountEdit') {
                ?>
                <div id='content' class="center">
                    <div class="container center_div">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="text-center">
                                    <h2 class="panel-title-texte"><?php echo "My Account"; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <?php
            }
            if ($_REQUEST["page"] === 'invoiceReport') {
                ?>
                <div id='content' class="center">
                    <div class="container center_div">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="text-center">
                                    <h2 class="panel-title-texte"><?php echo "Sales & Invoice Report"; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <?php
            }
        }
        ?>
                
        <div class="container center_div">
        <?php
        if (!empty($_REQUEST["page"])) {
            if ($_REQUEST["page"] === 'login') {
                require_once ($_REQUEST["page"] . '.html');
                
            } else if ($_REQUEST["page"] === 'stock' || $_REQUEST["page"] === 'myAccountEdit' || $_REQUEST["page"] === 'invoiceReport') {
                if (!empty($_REQUEST["alert"])) {
                    $alert = explode(',', $_REQUEST["alert"]);
                    $class = $alert[0];
                    $alert = $alert[1];
                }
                require_once ($_REQUEST["page"] . '.php');
            } else if ($_REQUEST["page"] === 'stockCreate') {
                if (!empty($_REQUEST["stockId"])) {
                    $id = $_REQUEST["stockId"];
                } else {
                    $create = true;
                }
                require_once ('stockCreateEdit.php');
            } else if ($_REQUEST["page"] === 'stockDelete') {
                if (!empty($_REQUEST["stock_id"])) {
                    require_once ('stockDelete.php');
                }
            } else if ($_REQUEST["page"] === 'product') {
                if (!empty($_REQUEST["stock_id"])) {
                    $stock_id = $_REQUEST["stock_id"];
                    require_once ('product.php');
                }
            } else if ($_REQUEST["page"] === 'shoppingCart') {
                require_once ('shoppingCart.php');
            } else if ($_REQUEST["page"] === 'registration') {
                if (!empty($_REQUEST['alert'])) {
                    $alert = $_REQUEST['alert'];
                }
                require_once ('registration.php');
            } else if ($_REQUEST["page"] === 'checkout') {
                if (!empty($_REQUEST['alert'])) {
                    $alert = $_REQUEST['alert'];
                }
                require_once ('checkout.php');
            }
        }
    ?>
    
    <?php// Index Page ?>
            
    <!-- -->
<?php
    require_once ('footer.php');
    
    // how to print an array
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/
