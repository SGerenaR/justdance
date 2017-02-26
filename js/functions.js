$(document).ready(function() {
    
    $('.clickable').click(function() {
        var stock_id = $(this).data('stockid');
        $(location).attr('href', 'home.php?page=product&stock_id=' + stock_id);
    });
    
    $('#addToCart').click(function() {
        var stock_id = $(this).data('stockid');
        var product_qty = $('#productQty').val();
        $.ajax({
            url: "addToCart.php",
            data: { stock_id: stock_id, product_qty: product_qty },
            success: function (data) {
                var returnedData = JSON.parse(data);
                $('#cartQty').html('Cart (' + returnedData.qty + ')');
            }
        });
    });
    
    $('.delCartItem').click(function() {
        var stock_id = $(this).data('stockid');
        $.ajax({
            url: "delCartItem.php",
            data: { stock_id: stock_id },
            success: function (data) {
                var returnedData = JSON.parse(data);
                $('#cartQty').html('Cart (' + returnedData.qty + ')');
                $(location).attr('href', 'home.php?page=shoppingCart');
            }
        });
    });
    
    $('#registrationCancel, #checkoutCancel').click(function() {
        $(location).attr('href', 'home.php');
    });
    
    $('#btnCheckout').click(function() {
        $(location).attr('href', 'home.php?page=checkout');
    });
 
    $( "select" ).change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
            if ($( this ).val() == 'creditcard') {
                $('#creditCardFields').removeClass('hide');
                $('#direcDepositFields').addClass('hide');
            } else if ($( this ).val() == 'directdeposit') {
                $('#direcDepositFields').removeClass('hide');
                $('#creditCardFields').addClass('hide');
            }
        });
        console.log(str);
    });
    
    $(function() {
        $("textarea").sceditor({
            plugins: "bbcode",
            style: "/minified/jquery.sceditor.default.min.css"
        });
    // Save this editor instance so the iframe can access it
    window.sceditorInstance = $("textarea").sceditor("instance");
    });
   
    
    $('.carousel').carousel({
        interval: 2000
    });
    
    
    $('#myCarousel').on('slide.bs.carousel', function () {
        // do something…
    });
    
});

/*$(document.body).on('change',"#paymentOptions",function (e) {
   //doStuff
   var optVal= $("#paymentOptions option:selected").val();
   console.log(optVal);
});*/