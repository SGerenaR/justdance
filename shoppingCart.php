<?php
require_once ('objects/Stock.php');
session_start();
if (isset($_SESSION['cart'])) {
    $productsIDs = array_keys($_SESSION['cart']);
    $Products = Stock::LoadArray($productsIDs); //array(1, 3, 5);
    ?>
    <form id="view_cart_form" name="shoppingCart" method="post" action="home.php?page=shoppingCart">
        <div>
            <div class="row">
                <div class="col-lg-6">
                  
                    <div id='content' class="center">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="text-center">
                                    <h2 class="panel-title-texte"><?php echo "Shopping Cart"; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                                foreach ($Products as $Product) {
                                    $c = 1;
                                    $shop = '';
                                    if($c % 2 == 0) {
                                        $shop = 'info';
                                    }
                                    $total += $_SESSION['cart'][$Product->getId()] * $Product->getPrice();
                                    ?>
                                    <tr class="<?php echo $shop; ?>">
                                        <td><?php echo $Product->getId(); ?></td>
                                        <td><?php echo $Product->getName(); ?></td>
                                        <td><?php echo $Product->getPrice(); ?></td>
                                        <td style="text-align: right"><?php echo $_SESSION['cart'][$Product->getId()]; ?></td>
                                        <td style="text-align: right"><?php echo $_SESSION['cart'][$Product->getId()] * $Product->getPrice(); ?></td>
                                        <td style="cursor: pointer; text-align: center;"><img class="delCartItem" data-stockid="<?php echo $Product->getId(); ?>" src="images/delete.png"></td>
                                    </tr>
                                    <?php
                                    $c++;
                                }
                            ?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td style="text-align: right"><?php echo $total; ?></td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <input type="button" id="btnCheckout" class="btn btn-primary" style="width: 100px" value="Checkout">
            </div>
        </div>
    </form>
<?php 
} else {
    echo 'Currently, there are no products in your cart';
}
