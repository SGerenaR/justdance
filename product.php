<?php
require_once ('objects/Stock.php');
?>
<div id='content' class="center">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="text-center">
                    <h2 class="panel-title-texte"><?php echo "Catalogue"; ?></h2>
                </div>
            </div>
        </div>
</div>

<?php
$stockID = $_REQUEST['stock_id'];
$Stock = Stock::LoadArray(array($stockID));
$Stock = current($Stock);
?>
<div>
    <br>
    <div style="float: left; width: 30%;">
        <br>
        <br>
        <br>
        <img src="<?php echo $Stock->getPath(); ?>" height="100" width="200">
    </div>
    <div style="float: left; width: 50%;">
        <div class="text-center">
            <h1><span class="label label-warning"><?php echo $Stock->getName(); ?></span></h1>
        </div>
        <br>
        <div><?php echo $Stock->getDescription(); ?></div>
    </div>
    <br>
    <br>
    <div class="text-center" style="float: left; width: 20%;">
        <div>
            <h1>
            <span class="label label-warning">  
            <?php echo $Stock->getPrice(); ?>
            </span>
            </h1>
            <div class="prodQtyFld">
                <input type="number" class="form-control" name="productQty" id="productQty" value="1">
                <div class="prodAddToCart">
                    <h3><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h3>
                    <button type="button" class="btn btn-warning" id="addToCart" name="addToCart" data-stockid="<?php echo $stockID; ?>">Add To Cart</button>
                </div>
            </div>
        </div>
    <br style="clear: left;"/>
    </div>
</div>
