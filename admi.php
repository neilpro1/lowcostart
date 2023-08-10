<?php
    include('firstSesson.class.php');
    include('struct.class.php');
    $img_dir = 'img/';
    $login = new FirstSesson();
    $admi = new Struct();
?>
<html>
    <head>
        <?php 
                if(isset($_POST['exit'])) {
                    $login->blockAcess();
                    header('Location:login.php');
                    exit();
                }
        ?>
        
        <link rel="stylesheet" href="css/style_admi.css">
        <style>
            body{
                display: 
                    <?php
                        if($login->haveAcess() && 
                          $login->haveAcessForPage() == 1)
                            echo 'inherit';
                        else 
                            header('Location:login.php');
                    ?>
            }
            
            updateBrand{
                display:
                    <?php
                        if(isset($_POST['updatebrand']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            updateLogo{
                display:
                    <?php
                        if(isset($_POST['uploadlogo']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            updateMainImage {
                display:
                    <?php
                        if(isset($_POST['uploadmainimage']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            newuser{
                display:
                    <?php
                        if(isset($_POST['newuser']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            addperfil {
                display:
                    <?php
                        if(isset($_POST['addperfil']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            addart {
                display:
                    <?php
                        if(isset($_POST['addart']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            changeaccount{
                 display:
                    <?php
                        if(isset($_POST['pass']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            removeuser{
                display: 
                    <?php
                        if(isset($_POST['removeuser']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            
            removepic {
                display: 
                    <?php
                        if(isset($_POST['removepic']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
            }
            addDetailsart{
                display:
                    <?php
                        if(isset($_POST['aboutdetailsart']))
                            echo 'inherit';
                        else
                            echo 'none';
                    ?>
                
            }
        </style>
    </head>
    
    <body>
        <div class='admi_menu'>
            <form method='post' class='form_menu'>
                <p>Menu</p>
                <ul>
                    <li><input type='submit' name='updatebrand' value='Change Your Brand'></li>
                    <li><input type='submit' name='uploadlogo' value='Upload Your Logo'></li>
                    <li><input type='submit' name='uploadmainimage' value='Upload Main Image'></li>
                    <hr>
                    <li><input type='submit' name='newuser' value='Add New User'> </li>
                    <li><input type='submit' name='addperfil' value='Add perfil'></li>
                    <li><input type='submit' name='addart' value='Add new Art'></li>
                    <li><input type='submit' value='Add Details' name='aboutdetailsart'></li>
                    <li><input type='submit' name='aboutartist' value='About Artists'></li>
                    <hr>
                    
                    <li><input type='submit' name='removeuser' value='Remove User'></li>
                    <li><input type='submit' name='removepic' value='Remove Art'></li>
                    <hr>
                    <li><input type='submit' name='pass' value='Change my Account'></li>
                    <li><input type='submit' name='footer' value='Footer'></li>
                    <li><input type='submit' name='exit' value='Exit and Save'></li>
                    
                </ul>
            </form>
        </div>
        
        <updateBrand>
            <form method="post">
                <label for='updatebrand'>Put here your brand:</label>
                <input type='text' name='updateBrand'>
                <input type='submit' name='okupdatebrand'>
            </form>
            <?php 
                if(isset($_POST['okupdatebrand'])){
                    @$brand = trim($_POST['updateBrand']);
                    if(!is_null($brand)){
                        $admi -> setBrand($brand);
                    }
                        
                }
            ?>
        </updateBrand>
        
        <updateLogo>
            <form method='post' enctype="multipart/form-data">
                <label for='updateLogo'>Choice your logo: </label>
                <input type='file' name='updateLogo' accept="image/*">
                <input type='submit' name='okUpdateLogo' value='Send'>
                <br>
                <p>Or</p>
                <label for='updateLogo'>Put here the link: </label>
                <input type='text' name='updateLogoWithLink'>
                <input type='submit' name='okUpdateLogoWithLink' value='Send'>
            </form>
            
            
            <?php
                if(isset($_POST['okUpdateLogo'])){
                    @$ext = strtolower(substr($_FILES['updateLogo']['name'],-4));
                    $admi -> setDirLogo($_FILES['updateLogo']['tmp_name'], $img_dir.'logo'.$ext);
                }else if(isset($_POST['okUpdateLogoWithLink'])){
                    $admi -> setDirLogoWithLink($_POST['updateLogoWithLink']);
                }
            ?>
        </updateLogo>
        
        
        <updateMainImage>
            <form method='post' enctype="multipart/form-data">
                <labe for='updateMainImage'>Choice your image: </labe>
                <input type='file' name='uploadMainImage' accept="image/*">
                <input type='submit' value='Send' name='updatemainimage'>
                <br>
                <p>Or</p>
                <label for='updateMainImageWithLink'>Put link here: </label>
                <input type='text' name='updateMainImageWithLink'>
                <input type='submit' value='Send' name='updatemainimagewithlink'>
            </form>
            
            <?php 
                if(isset($_POST['updatemainimage'])) {
                    $ext = strtolower(substr($_FILES['uploadMainImage']['name'],-4));
                    $admi -> setImageForMain($_FILES['uploadMainImage']['tmp_name'],$img_dir.'imageMain'.$ext);
                }else if(isset($_POST['updatemainimagewithlink'])){
                    $admi -> setMainImageWithLink($_POST['updateMainImageWithLink']);
                }
            ?>
        </updateMainImage>
        
        <newuser>
            <form method='post' enctype="multipart/form-data">
                <label for=''>Name: </label>
                <input type='text' name='nameUser'>
                <p></p>
                <label>User name: </label>
                <input type='text' name='userName'>
                <p></p>
                <input type='submit' name='addNewUser' value='Send'>
            </form>
            
            <?php 
                if(isset($_POST['addNewUser'])){
                    @$name = $_POST['nameUser'];
                    @$username = $_POST['userName'];         
                    
                    if(empty($name) || empty($username)){
                        echo 'Error, name or username is empty!';
                    }else if(@$admi-> existUser($username)){
                        echo 'This user already exist, please try other username!';
                    }else{
                        $admi -> setUser($name, $username);
                        echo 'Sucess...';
                    }   
                }
            ?>
        </newuser>
        
        <addperfil>
            <form method='post' enctype="multipart/form-data">
                <label>Select username: </label>
                <select name = 'optionusername'>
                    <?php 
                        @$allartist = $admi -> getUsers();
                        foreach($allartist as $key => $value){
                            echo "<option>$key</option>";
                        }
                    ?>
                </select>
                <input type='file' name='uploadperfil'>
                <input type='submit' name='SendPerfil' value='Send'>
            </form>
            <?php
                if(isset($_POST['SendPerfil'])) {
                    @$ext = strtolower(substr($_FILES['uploadperfil']['name'],-4));
                    @$username = $_POST['optionusername'];
                    $admi -> setPic($username, $_FILES['uploadperfil']['tmp_name'], $img_dir.$username.$ext);
                }
                    
            ?>
        </addperfil>
        
        <addart>
            <form method='post' enctype="multipart/form-data">
                <label>Choice here your art: </label>
                <select name='optionusernameart'>
                    <?php 
                        @$allartist = $admi -> getUsers();
                        foreach($allartist as $key => $value){
                            echo "<option>$key</option>";
                        }
                    ?>
                </select>
                
                <input type='file' name='uploadart'>
                <p></p>
                <label>Name: </label>
                <input type='text' name='nameart'>
                <p></p>
                <label>price: </label>
                <input type='text' name='priceart'>
                <p></p>
                <label>Link: </label>
                <input type='text' name='linkpay'>
                <p></p>
                <label>Add more pic: </label>
                <input name='otherPic[]' type='file' multiple>
                <p></p>
                <input type='submit' name='sendart' value='Send'>
            </form>
            
            <?php
                if(isset($_POST['sendart'])){
                    @$ext = strtolower(substr($_FILES['uploadart']['name'],-4));
                    @$username = $_POST['optionusernameart'];
                    @$nameart = $_POST['nameart'];
                    @$price = $_POST['priceart'];
                    $admi-> setArt($username, $_FILES['uploadart']['tmp_name'],$nameart,$img_dir.$nameart.$ext);
                    $admi-> setDescArt($username, $nameart, 'price', $price);
                    @$link = $_POST['linkpay'];
                    $admi -> setDescArt($username,$nameart,'link',$link);
                    @$otherPic = $_FILES['otherPic']['tmp_name'];
                    foreach($otherPic as $key => $value){
                        $admi-> setOtherArt($username, $_FILES['otherPic']['tmp_name'][$key],$nameart, $img_dir.$nameart.$key.$ext);
                    }
                } 
            ?>
        </addart>
        
        <changeaccount>
            <form method='post' enctype="multipart/form-data">
                <label>Username: </label>
                <input type='text' name='newusername'>
                <p></p>
                <label>Password: </label>
                <input type='password' name='newpassword'>
                <p></p>
                <label>Repeat Password: </label>
                <input type='password' name='newpasswordA'>
                <p></p>
                <input type='submit' name='changeusername' value='Send'>
            </form>
            
            <?php
                if(isset($_POST['changeusername'])){
                    @$username = trim($_POST['newusername']);
                    @$pass = trim($_POST['newpassword']);
                    @$passA = trim($_POST['newpasswordA']);
                    
                    if($username == '' || $pass == '' || $passA == ''){
                        echo "<p>*Repeat again maybe user or password is null!</p>";
                    }else if($pass != $passA)
                        echo "<p>*Password not match!</p>";
                    else{
                        $login->setUser($username);
                        $login->setPassword($pass);
                    }
                }
            ?>
        </changeaccount>
        
        
        <removeuser>
            <form method='post' enctype="multipart/form-data">
                <select name='selectremoveuser'>
                    <?php
                        @$allartist = $admi -> getUsers();
                        foreach($allartist as $key => $value){
                            echo "<option>$key</option>";
                        }
                    ?>
                </select>
                <input type='submit' value='Send' name='removeUser'>
            </form>
            
            <?php
                if(isset($_POST['removeUser'])){
                    $admi->removeUser($_POST['selectremoveuser']);
                }
            ?>
        </removeuser>
        
        <removepic>
            <form method='post' enctype="multipart/form-data">
                <select name='selectremovepic'>
                    <?php
                        @$allartist = $admi -> getUsers();
                        
                        foreach($allartist as $key => $value){
                            @$allArt = $value->getAllArt();
                            foreach($allArt as $key1 => $value1) {
                                echo "<option>$key1</option>";
                            }
                        }
                    ?>
                </select>
                <input type='submit' value='Send' name='removePic'>
            </form>
            
            <?php
                if(isset($_POST['removePic'])) {
                    @$allartist = $admi -> getUsers();
                    foreach($allartist as $key => $value) {
                        foreach($value->getAllArt() as $key1 => $value1) {
                            if($_POST['selectremovepic'] == $key1) {
                                $admi->removePic($key, $key1);
                            }
                        }
                    }
                }
            ?>
        </removepic>
        
        <addDetailsart>
            <form method='post' enctype="multipart/form-data">
                 <select name='selectadddescrart'>
                    <?php
                        @$userart;
                        @$allartist = $admi -> getUsers();
                        foreach($allartist as $key => $value){
                            $userart = $key;
                            @$allArt = $value->getAllArt();
                            foreach($allArt as $key1 => $value1) {
                                echo "<option>$key1</option>";
                            }
                        }
                     ?>
                </select>
                <br><br>
                <?php
                    for($i = 0 ; $i < 20 ; $i++) {
                        echo 
                            "<label for='value'>var: </label>
                            <input type='text' name='vardetailsart[]'>
                            <label for='value'>value: </label>
                            <input type='text' name='valuedetailsart[]'>
                            <br><br>
                            ";
                    }
                ?>
                <input type='submit' value='Send' name='addmoredetailsart'>
            </form>
            
            <?php
                if(isset($_POST['addmoredetailsart'])){
                    for($i = 0 ; $i < 20 ; $i++) {
                        $admi->setDescArt($userart, $_POST['selectadddescrart'], $_POST['vardetailsart'][$i], $_POST['valuedetailsart'][$i]);
                    }
                }
            ?>
        </addDetailsart>
    
        <aboutartist>  
        </aboutartist>
        
    </body>
</html>
