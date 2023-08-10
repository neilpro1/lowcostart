<?php
include("userMain.php"); ?>
<html>
    <head></head>
    <body>
        <?php
            $users = new UserListMain();
            foreach($users->getUsers() as $key => $value){
                //echo "$key";
            }
        ?>
    </body>
</html>