<?php //include('config.php');
include('header.php');
     ?>
<html>
    <head>
        <link rel="stylesheet" href="css/style_main.css" >
        <style>
            #main{
                background-image: url("<?php echo getDirImageMain();?>");
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: local;
                z-index: -1;
            }
        </style>
    </head>
    
    <body>
        
        <div id = "main">
        </div><!--main-->
        
        <div class="main_class">
            <div class="apresentation">
                <div class="aprensetation_insider">
                        <h1>Welcome to <?php echo getBrand() ?></h1>
                        <span>Here you find the best arts, physical arts and NFTs.</span>
                        <br>
                        <a href="explore.php">
                            <input type="button" value="Explore" >
                        </a>
                </div><!--apresentation_insider-->
            </div><!--apresentation-->
            
            <div class="catalogue">
                <div class="catalogue_insider">
                    <div id="image_catalogue">
                        <a href="">
                                <img src="
                                <?php 
                                    echo getDirImageMain(); 
                                ?>"/>
                         </a>
                    </div>
                </div><!--catalogue_insider-->
            </div><!--catalogue-->
        </div>
    </body>
</html>