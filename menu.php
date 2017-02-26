<?php
require_once ('functions.php');
?>
<div class="container center_div">
    
<nav class="navbar navbar-inverse">
    
    <div class="container center_div">
                <b><a class="navbar-brand" href="home.php">Home</a>
    <?php if (existsSession()) { ?>
        <a class="navbar-brand" href="home.php?page=stock"><?php if ($_SESSION['sipoz_user_group'] === 'a')  { ?>Stock<?php } else { ?>Catalogue<?php } ?></a>
        <a class="navbar-brand" href="home.php?page=invoiceReport">Sales & Invoice</a>
    <?php }
        if (existsSession()) { ?>
        <a class="navbar-brand" href="home.php?page=myAccountEdit">My Account</a>
        <a class="navbar-brand navbar-right" href="home.php?logout=true">Log Out&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <?php } else { ?>
        <a class="navbar-brand" href="home.php?page=Products">Product</a>
        <a class="navbar-brand" href="home.php?page=Services">Services</a>
        <a class="navbar-brand" href="home.php?page=Contact">Contact</a>
        <a class="navbar-brand" href="home.php?page=registration">Registration</a>
        <a class="navbar-brand navbar-right" href="home.php?page=login">LogIn&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <?php } ?>
    </b>
        </div>
</nav>
</div>
