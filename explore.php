<?php include('config.php'); ?>
<?php include('header.php'); ?>

<html>
    <head>
        <link rel="stylesheet" href="css/style_explore.css">
    </head>

    <?php 
        @$users = getUsers();
        foreach(@$users as $key => $value){
            if(isset($_POST[$key])){
                setUserPage($value);
                header('Location:user.php');
                exit();
            }
        }
    
        @$userss = getUsers();
        foreach(@$userss as $key => $value) {
            foreach($value->getAllArt() as $key1 => $value1) {
                if(isset($_POST[$key.$key1])) {
                    setPicPage($value1);
                    setUserPage($value);
                    header('Location:picpage.php');
                    exit();
                }
            }
        }
    ?>
    
    <body>
        <div class='header_class_explore'>
            
            <?php
                foreach(@$users as $key => $value) {
                    @$name = $value->getName();
                    @$pic = $value->getPic();
                    @$arts = $value->getAllArt();
                    foreach($arts as $key1 => $value1) {
                        @$dir = $value1->getDir();
                        @$price = $value1->getPrice();
                        @$keyV = $key.$key1;
                        echo
                            "<div class='gridA'>
                                <div class='gridB'>
                                    <form method='POST'>
                                        <button name='$keyV'>
                                            <img src='$dir'>
                                        </button>
                                    </form>
                                </div>
                                <div class='gridC'>
                                    <img src='$pic'>
                                    <p id='p'>$name</p>
                                    <br>
                                    <form method='post' enctype='multipart/form-data'>
                                        <input type='submit' name='$key'
                                        value='$key'>
                                    </form>
                                    <p> &#8226 $price</p>
                                </div>
                            </div>";
                    }
                }
            ?>
        </div>
    </body>
</html>