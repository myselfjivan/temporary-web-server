<?php
$path = "/var/www/html/temporaryWebServer/" . $_POST["path"];
mkdir($path, 0777, true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Temporary Web Server </title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
        <div class="main">
            <h1>Temporary Web Server</h1>
            <div class="content">

                <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true   // 100% fit in a container
                        });
                    });

                </script>
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <div class="pay-tabs">
                            <h2>Select Payment Method</h2>
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Simple </span></li>
                                <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3"></label>Dynamic</span></li>
                                <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>Dynamic + Database</span></li> 
                                <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"></label>Size > 10MB</span></li>
                                <div class="clear"></div>
                            </ul>	
                        </div>
                        <div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <div class="payment-info">
                                    <h3>Basic Information</h3>
                                    <form>
                                        <div class="tab-for">				
                                            <h5>Name of the website (to be used as path)</h5>
                                            <input type="text" value="">
                                            <h5>File Upload</h5>
                                            <input type="file" value="">
                                        </div>				
                                        <input type="submit" value="SUBMIT">
                                    </form>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox"  id="brand" value="">
                                                <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                <div class="payment-info">
                                    <h3>Basic Information</h3>
                                    <form>
                                        <div class="tab-for">				
                                            <h5>Name of the website (to be used as path)</h5>
                                            <input type="text" value="">
                                            <h5>File Upload</h5>													
                                            <input type="text" value="">
                                        </div>				
                                        <input type="submit" value="SUBMIT">
                                    </form>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox"  id="brand" value="">
                                                <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                <div class="payment-info">
                                    <h3>Basic Information</h3>
                                    <form>
                                        <div class="tab-for">				
                                            <h5>Name of the website (to be used as path)</h5>
                                            <input type="text" value="">
                                            <h5>Database file (.sql)</h5>													
                                            <input type="file" >
                                        </div>				
                                        <input type="submit" value="SUBMIT">
                                    </form>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox"  id="brand" value="">
                                                <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">	
                                <div class="payment-info">
                                    <h3>Basic Information</h3>
                                    <form>
                                        <div class="tab-for">				
                                            <h5>Name of the website (to be used as path)</h5>
                                            <input type="text" value="">
                                            <h5>File Upload</h5>													
                                            <input type="text" value="">
                                        </div>				
                                        <input type="submit" value="SUBMIT">
                                    </form>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox"  id="brand" value="">
                                                <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>	
                            </div>
                        </div>	
                    </div>
                </div>	

            </div>
            <p class="footer">Copyright © 2016 KITCSE| Designed by <a href="https://facebook.com/myselfjivan/" target="_blank">Jivan G. and Sushmita C.</a></p>
        </div>
    </body>
</html>
<html>
    <body>
        <form action="" method="POST">
            <input type="text" name="path" value="">
            <input type="submit">
        </form>
    </body>
</html>