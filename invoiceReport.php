<?php
require_once ('objects/Invoice.php');
?>

<form name="salesInvoiceReport" method="post" action="home.php?page=invoiceReport">
    <div class="form-group">
        <label for="PutInvoice">Invoice Number</label>
            <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber" placeholder="Invoice Number ..... " value="<?php if (!empty($number)) { echo $Invoices->getClientId(); }?>">
    </div>
    <br>
    <div class="form-group">
        <label for="PutDateFrom">Date From</label>
            <input type="text" class="form-control" name="dateFrom" id="dateFrom" placeholder="From: (yyyy-mm-dd).........." value="<?php if (!empty($number)) { echo $Invoices->getD(); }?>">
        <label for="PutDateTo">To:</label>
            <input type="text" class="form-control" name="dateTo" id="dateTo" placeholder="To:(yyyy-mm-dd).........." value="<?php if (!empty($number)) { echo $Invoices->getD(); }?>">
    </div>
    <br>
    <?php if ($_SESSION['sipoz_user_group'] === 'a') { ?>
        <div class="form-group">
            <label for="PutNameClient">Client Name</label>
            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="Client Name......." value="<?php if (!empty($number)) { echo $Invoices->getClientId(); }?>">
        </div>
        <br>
    <?php } ?>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 250px" value="search">
    </div>
    <?php
        if (!empty($_REQUEST["invoiceNumber"]) || !empty($_REQUEST["dateFrom"]) || !empty($_REQUEST["dateTo"]) || !empty($_REQUEST["clientName"])) {
    ?>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Client Id</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $invoiceNumber = !empty($_REQUEST["invoiceNumber"]) ? array($_REQUEST["invoiceNumber"]) : null;
                            $dateFrom = $_REQUEST["dateFrom"];
                            $dateTo = $_REQUEST["dateTo"];
                            // @todo validate that date from and to have a value
                            $date = (!empty($dateFrom) && !empty($dateTo)) ? array($dateFrom, $dateTo) : null;
                            /*if (!empty($dateFrom) && !empty($dateTo)) {
                                $date = array($dateFrom, $dateTo);
                            } else {
                                $date = null;
                            }*/
                            $clientName = $_REQUEST["clientName"];
                            $Invoices = new Invoice();
                            $userType = $_SESSION['sipoz_user_group'];
                            $clientId = $_SESSION['sipoz_client_id'];
                            $sales = $Invoices->loadArray($invoiceNumber, $date, $clientName, $userType, $clientId);
                            if (!empty($sales)) {
                                $total = 0;
                                foreach ($sales as $Invoice) {
                                    $class = '';
                                     if ($i % 2 == 0) {
                                        $class = 'info';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $Invoice->getNumber(); ?></td>
                                        <td><?php echo $Invoice->getDate(); ?></td>
                                        <td><?php echo $Invoice->getClientName(); ?></td>
                                        <td><?php echo '$' . $Invoice->getAmount(); ?></td>
                                        <td><?php echo $Invoice->getStatus(); ?></td>
                                    </tr>
                                    <?php
                                    $total += $Invoice->getAmount();
                                }
                                ?>
                                <tr>
                                    <td>TOTAL:</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><?php echo '$' . $total; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    <?php
        }
    ?>
</form>
