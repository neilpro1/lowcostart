<html>
    <head>
        <link rel='stylesheet' href='css/style_pic.css'>
    </head>
    <style>

        body {
            /*font-family: Verdana, sans-serif; margin:0*/
        }
        .mySlides {display: none}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }

        /* Next & previous buttons */
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
          right: 40%;
          border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
          background-color: #717171;
        }

        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }

        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }


</style>

    <body>
        <div class='img_pic'>
            
            <?php 
            include('config.php');
            include('header.php');
        
            @$user = getUserPage();
            @$pic = getPicPage();
            @$dir = $pic -> getDir();
            @$username = $user->getUsername();
       
            $allPic[$pic-> getName()] = $pic -> getDir();
            foreach($pic -> getOtherArt() as $key => $value) {
                $allPic[$key] = $value;
            }
            
            foreach($allPic as $key => $value){
                echo 
                    "<div class='slideshow-container'>
                        <div class='mySlides fade'>
                            <img src='$value'>
                        </div>
                    </div>
                    <a class='prev' onclick='plusSlides(-1)'>❮</a>
                    <a class='next' onclick='plusSlides(1)'>❯</a>
                    ";
            }
            

            ?>
        </div>
        
        
        <div class='info_art'>
            <h1><?php echo $pic->getName()?></h1> 
            <br>
            <div id='userName'>
                <h1>
                    <span>Owned by</span>
                    <?php
                        echo $username;
                    ?> 
                </h1>
            </div>
            
            <div class='priceArt'>
                <p>Price: </p>
                <h1><?php echo $pic->getPrice()?></h1> 
                
            </div>
            <?php @$linkpay = $pic -> getDesc()['link'];?>
            <a href=<?php echo $linkpay?>>Buy Now</a>
            
            <div class='descriptionArt'>
                <p>Description:</p>
                <ul>
                    <li>Author: <?php echo "<p>".$user->getName()."</p>";?></li>
                     
                </ul>
            </div>
            
        </div>
    </body>
    
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }

          slides[slideIndex-1].style.display = "block";  

        }
    </script>
</html>