<?php
require_once ('objects/Invoice.php');
?>
<form id="search_invoice_form" name="search_invoice_form" method="post" action="home.php?page=invoice">
    <div>
        <label>Search item:&nbsp;&nbsp;</label><input type="text" id="search_invoice" name="search_invoice">&nbsp;&nbsp;<input type="submit" value="Search"><br><br>
        
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Client Id</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($_REQUEST["search_invoice"])) {
                        $search = $_REQUEST["search_invoice"];
                    } else {
                        $search = null;
                    }
                    $Invoices = new Invoice();
                    $sales = $Invoices->loadArray(null, $search);
                    if (!empty($sales)) {
                        foreach ($sales as $Invoices) {
                            ?>
                            <tr>
                                <td><?php echo $Invoice->getNumber(); ?></td>
                                <td><?php echo $Invoice->getDate(); ?></td>
                                <td><?php echo $Invoice->getClientId(); ?></td>
                                <td><?php echo $Invoice->getAmount(); ?></td>
                                <td><?php echo $Invoice->getStatus(); ?></td>
                                <!--<td><a href="home.php?page=stockCreate&stockId=<?php echo $Stock->getId(); ?>">Edit</a></td>
                                <td><a href="#"><img src="images/delete.png"></a></td>-->
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</form>