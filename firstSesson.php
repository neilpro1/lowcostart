<?php 
    include('data.class.php');
    include('firstSesson.class.php');
    $firstS = new FirstSesson();
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style_firstSesson.css">
        <style>
            body {
                display: 
                    <?php
                        if($firstS->haveAcess())
                            header('Location:login.php');
                        else
                            echo 'inherit';
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
                <div class='pass'>
                    <label for='user'>Repeat Password: </label>
                    <input type='password' name='passwordA'>
                </div>
                
                <div class='submit'>
                    <input type='submit' name='submit'>
                </div>
            </form>
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])) {
        $user = trim($_POST['username']);
        $pass = $_POST['password'];
        $re_pass = $_POST['passwordA'];
        
        if($user == '' || $pass == '' || $re_pass == '')
            echo "<p>*Repeat again maybe user or password is null!</p>";
        else if($pass != $re_pass)
            echo "<p>*Password not match!</p>";
        else {
            $firstS->setUser($user);
            $firstS->setPassword($pass);
            header("Location:login.php");
            exit();
        }
    } 

?>