<?php 
    include('data.class.php');
    include('firstSesson.class.php');
    $login = new FirstSesson();
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style_firstSesson.css">
        <style>
            .form_class{
                display: 
                    <?php
                        if($login->haveAcess())
                            echo 'inherit';
                        else {
                            header('Location:firstSesson.php');
                        }
                            
                    ?>
            }
        </style>
    </head>
    <body>
        <div class='form_class'>
            <form method='post'>
                <div class='user'>
                    <label for='user'>Username: </label>
                    <input type='text' name='username'>
                </div>
                
                <div class='pass'>
                    <label for='user'>Password: </label>
                    <input type='password' name='password'>
                    
                </div>
                
                <div class='submit'>
                    <input type='submit' name='submit' value='Send'>
                    <a href='index.php'>Go to Site</a>
                </div>
            </form>
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if($user == $login->getUser() && $pass == $login->getPassword()){
            $login -> desblockAcess();
            header("Location:admi.php");
            exit();
        }
    }
?>