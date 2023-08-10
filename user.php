<?php 
    include('config.php');
    include('header.php');
?>
<htm>
    <head>
        <link rel='stylesheet' href='css/style_user.css'>
    </head>
    <?php
            @$user = getUserPage();
            @$pic = $user->getPic();
            @$nameUser = $user->getName();
            @$arts = $user->getAllArt();
            foreach($arts as $key => $value) {
                if(isset($_POST[$key])){
                    setUserPage($user);
                    setPicPage($value);
                    header('Location:picpage.php');
                    exit();
                }
            }
    ?>

    <body>
        <div class='headeruser'>
                
         </div>
            
        <div class='img_user'>
            <?php echo "<img src='$pic'> \n<p>$nameUser</p>"?>
        </div>
        
        <?php
            foreach($arts as $key1 => $value1) {
                $dir = $value1 -> getDir();
                $price = $value1->getPrice();
                $name = $value1->getName();
                echo 
                    " 
                    <form method='POST'>
                        <button name='$key1'>
                            <img src='$dir'>
                                <p>&#8226 $name</p>
                                <p>&#8226 $price</p>
                        </button>
                    </form>
                    ";
            }
        ?>
    </body>
</htm>