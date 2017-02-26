<?php
if (!empty($_REQUEST)) {
    error_log('$pya: ' . $_REQUEST['paymentOptions']);
    if ($_REQUEST['paymentOptions'] !== '-1') {
        $payment = false;
        switch ($_REQUEST['paymentOptions']) {
            case 'creditcard':
                if (!empty($_REQUEST['cardno']) && !empty($_REQUEST['expiryDate']) && !empty($_REQUEST['ccv'])) {
                    $payment = true;
                } else {
                    $alert = "Please fill in your credit card details.";
                }
                break;

            case 'directdeposit':
                if (!empty($_REQUEST['bsb']) && !empty($_REQUEST['accno']) && !empty($_REQUEST['accname'])) {
                    $payment = true;
                } else {
                    $alert = "Please fill in your bank details.";
                }
                break;
        }
        if ($payment) {
            $alert = "Your payment has been successful. Thank you for your purchase.";
            session_start();
            unset($_SESSION['cart']);
        }
    } else {
        $alert = "Please select a payment option.";
    }
} else {
    $alert = "Please fill in all the details.";
}
header('Location: home.php?page=checkout&alert=' . $alert);
