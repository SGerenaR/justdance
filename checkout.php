<?php
require_once ("objects/User.php");
if (!empty($_SESSION['sipoz_user_id'])) {
    $User = User::loadArray(array($_SESSION['sipoz_user_id']));
    $User = current($User);
}
?>
<script src="js/functions.js" type="text/javascript"></script>
<form name="checkout" method="post" action="checkoutSummary.php">
    <div>
        <?php echo $alert; ?>
    </div>
    <br>
    
    <div class="form-group">
        <label for="PutName">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="<?php echo $User->getFirstName(); ?>">
    </div>
    
    <div class="form-group">
        <label for="PutSurname">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="User Surname" value="<?php echo $User->getLastName(); ?>">
    </div>
    
    <div class="form-group">
        <label for="PutAddress">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="User Address" value="<?php echo $User->getAddress(); ?>">
    </div>
    
    <div class="form-group">
        <label for="PutPhoneNumber">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="User Phone Number" value="<?php echo $User->getPhone(); ?>">
    </div>
    
    <div>
        <label>Payment Options</label>
    </div>
    <select class="form-control" style="width: 250px" id="paymentOptions" name="paymentOptions">
        <option value="-1">Select a payment method</option>
        <option value="paypal">PayPal</option>
        <option value="creditcard">VISA</option>
        <option value="creditcard">MasterCard</option>
        <option value="directdeposit">Direct Deposit</option>
    </select>
    
    <br>
    <div class="form-group hide" id="creditCardFields">
        <label>Credit Card Number</label>
        <input type="text" id="cardno" name="cardno">
        <label>&nbsp;&nbsp;&nbsp;Expiry Date</label>
        <input type="text" id="expiryDate" name="expiryDate">
        <label>&nbsp;&nbsp;&nbsp;CCV</label>
        <input type="text" id="ccv" name="ccv">
    </div>
    
    <br>
    <div class="form-group hide" id="direcDepositFields">
        <label>BSB</label>
        <input type="text" id="bsb" name="bsb">
        <label>&nbsp;&nbsp;&nbsp;Account Number</label>
        <input type="text" id="accno" name="accno">
        <label>&nbsp;&nbsp;&nbsp;Account Name</label>
        <input type="text" id="accname" name="accname">
    </div>
    
    <br>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 150px" value="Pay Now">
        <input type="button" id="checkoutCancel" class="btn btn-primary" style="width: 100px" value="Cancel">
    </div>
</form>
