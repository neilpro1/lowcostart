<?php 
    //include('config.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style_header.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <header>
            <div class="header_class">
                <div class="logo">
                    <a href="index.php">
                        <div>
                            <div id="logo_image">
                                <img src="
                                    <?php 
                                        echo getDirLogo(); 
                                    ?>"/>
                            </div><!--logo_brand-->
                        </div>
                        <div>
                            <div id="logo_brand">
                                <p>
                                    <?php
                                        echo getBrand();
                                    ?>
                                </p>
                            </div><!--logo_image-->
                        </div>
                    </a><!--link-->
                </div><!--logo-->
                
                <div class="menu">
                    <div class="menu_insider">
                        <div>
                            <a href="index.php">Home</a>
                        </div>
                        <div>
                            <a href="explore.php">Explore</a>
                        </div>
                        <div>
                            <a href="help.php">Help</a>
                        </div>
                    </div><!--menu_inside-->
                </div><!--menu-->
                
            </div><!--header_class-->
        </header><!--header-->
    </body>
</html>