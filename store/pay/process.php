<?php
if (isset($_POST['submit'])) {
   
    //Here we can use paypal url or sanbox url.
    $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
    //Here we can used seller email id. 
    $merchant_email = 'salem_kajanija@hotmail.com';
    //here we can put cancle url when payment is not completed.
    $cancel_return = "http://".$_SERVER['HTTP_HOST'].'/pay/';
    //here we can put cancle url when payment is Successful.
    $success_return = "http://".$_SERVER['HTTP_HOST'].'/pay/success.php';
    //paypal call this file for ipn
    $notify_url = "http://".$_SERVER['HTTP_HOST'].'/pay/ipn.php';
    ?>
    <div style="margin-left: 38%"><img src="images/ajax-loader.gif"/><img src="images/processing_animation.gif"/></div>
    <form name="myform" action="<?php echo $paypal_url;?>" method="post">
        <input type="hidden" name="business" value="<?php echo $merchant_email;?>" />
        <input type="hidden" name="notify_url" value="<?php echo $notify_url;?>" />
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_return;?>" />
        <input type="hidden" name="return" value="<?php echo $success_return;?>" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="lc" value="" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="page_style" value="paypal" />
        <input type="hidden" name="charset" value="utf-8" />
        <input type="hidden" name="item_name" value="HeadPhone" />
        <input type="hidden" name="cbt" value="Back to FormGet" />
        <input type="hidden" value="_xclick" name="cmd"/>
        <input type="hidden" name="amount" value="80" />
        <script type="text/javascript">
            document.myform.submit();
        </script>
    <?php }
    ?>