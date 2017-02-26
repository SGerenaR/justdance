<?php
    require_once ("objects/Stock.php");
    if (!empty($id)) {
        $ids = array($id);
        $StockItem = Stock::loadArray($ids);
        $StockItem = $StockItem[0];
        $updateCreate = "Update Stock Item";
    } else {
        $StockItem = new Stock();
        $updateCreate = "Create New Stock";
    }
?>
<div id='content' class="center">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="text-center">
                <h2 class="panel-title-texte"><?php echo $updateCreate; ?></h2>
            </div>
        </div>
    </div>
</div>

<form name="stockCreateEdit" method="post" action="stockUpdate.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="PutName">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="New Stock Name ..... " value="<?php if (!empty($id)) { echo $StockItem->getName(); }?>">
    </div>
    
    <div class="form-group">
        <label for="PutDescription">Description</label>
            <textarea class="form-control" rows="8" cols="40" id="description" name="description" placeholder="New Stock Description ..... "><?php if (!empty($id)) { echo $StockItem->getDescription(); }?></textarea>
    </div>
    
    <div class="form-group">
        <label for="PutOnHand">OnHand</label>
            <input type="text" class="form-control" id="onHand" name="onHand" placeholder="New Stock onHand ..... " value="<?php if (!empty($id)) { echo $StockItem->getOnHand(); }?>">
    </div>
    
    <div class="form-group">
        <label for="PutPrice">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="New Stock price ..... " value="<?php if (!empty($id)) { echo $StockItem->getPrice(); }?>">
    </div>
    
    <div class="form-group">
        <label for="PutImage">Image</label>
        <input type="file" name="uploadFile" id="uploadFile">
    </div>
    
    <div>
        <label>Status</label>
    </div>
    
    <select class="form-control" style="width: 150px" name="status" id="status">
        <option value="e" <?php if (!empty($id) && $StockItem->getStatus() === "e") { echo 'selected="selected"'; }?>>Enabled</option>
        <option value="d" <?php if (!empty($id) && $StockItem->getStatus() === "d") { echo 'selected="selected"'; }?>>Disabled</option>
    </select>
    
    <div>
        <input type="hidden" id="stock_id" name="stock_id" value="<?php if (!empty($id)) { echo $StockItem->getId(); } ?>">
    </div>
    
    <br>
    <div>
        <?php
            if (!empty($create)) {
        ?>
            <input type="submit" class="btn btn-primary" style="width: 250px" value="Create">
        <?php
            } else {
                
        ?>
            <input type="submit" class="btn btn-primary" style="width: 250px" value="Update">
        <?php
            }
        ?>
    </div>
</form>
