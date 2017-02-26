<?php
require_once ('objects/Stock.php');
?>
<form id="search_stock_form" name="search_stock_form" method="post" action="home.php?page=stock">
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_stock" name="search_stock" placeholder="Search for...">
                        <span class="input-group-btn">
                            <input class="btn btn-default" type="submit" value="Search">
                        </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <br>
        
                            
        <?php if ($_SESSION['sipoz_user_group'] === 'a')  { ?>
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="home.php?page=stockCreate">Create New</a></li>
            </ul>
            <br>
            <?php } ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>On-Hand</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Insert-img</th>
                    <?php if ($_SESSION['sipoz_user_group'] === 'a')  { ?>
                        <th colspan="2">Actions</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($_REQUEST["search_stock"])) {
                        $search = $_REQUEST["search_stock"];
                    } else {
                        $search = null;
                    }
                    $Stock = new Stock();
                    $products = $Stock->loadArray(null, $search);
                    if (!empty($products)) {
                        $i = 1;
                        foreach ($products as $Stock) {
                            $class = '';
                                if ($i % 2 == 0) {
                                $class = 'info';
                            }
                            ?>
                            <tr class="<?php echo $class; ?> clickable" data-stockid="<?php echo $Stock->getId(); ?>">
                                <td><?php echo $Stock->getId(); ?></td>
                                <td><?php echo $Stock->getName(); ?></td>
                                <td><?php echo $Stock->getDescription(); ?></td>
                                <td><?php echo $Stock->getOnHand(); ?></td>
                                <td><?php echo $Stock->getPrice(); ?></td>
                                <td><?php echo $Stock->getStatus(); ?></td>
                                <td><?php echo $Stock->getPath(); ?></td>
                                <?php if ($_SESSION['sipoz_user_group'] === 'a')  { ?>
                                    <td><a href="home.php?page=stockCreate&stockId=<?php echo $Stock->getId(); ?>">Edit</a></td>
                                    <td><a href="home.php?page=stockDelete&stock_id=<?php echo $Stock->getId(); ?>" onclick="return confirm('Are you sure you want to delete this item?')"><img src="images/delete.png"></a></td>
                                <?php } ?>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</form>
