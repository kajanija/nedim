<html>
    <head>
        <title>PayPal IPN Message in PHP</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="robots" content="noindex, nofollow">
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-43981329-1']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        <div id="main">
            <center><h1>PayPal IPN Example Using PHP</h1></center>
            <div id="login">
                <h2>PayPal IPN Message in PHP</h2>
                <hr/>
                <div id="left">
                    <form action="process.php" method="post" >
                        <center>
                            <h3>SONY HEADPHONE</h3>
                        </center>
                        <img src="images/headphones.jpg" />
                        <center><input type="submit" name="submit" value=" Buy Now $80" ></center>
                    </form>
                </div>
                <div id="right">
                    <p style="text-align: justify;">Instant Payment Notification (IPN) is a message service that automatically notifies merchants of events related to PayPal transactions.</p>
                    <center>
                        <hr class="style-four">
                    </center>
                    <ul>
                        <li>Enable the IPN (Instant Payment Notification) from your PayPal account if it is not enable then IPN Message will not we POST.</li>
                        <li>IPN Message only be generate on the the server, At the local server IPN message will not be generate.</li>
                        <li>We can send IPN message to merchant's Email Address as long as We can Store IPN message in the database.</li>
                    </ul>  
                </div>
            </div>
        </div><img id="paypal_logo" src="images/secure-paypal-logo.jpg">
    </body>
</html>