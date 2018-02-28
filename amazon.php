<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Some New Page Rechanged</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/welcomePage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="first">
            <img src="/home/vishakha/Downloads/loading_spinner.gif"/>
        </div>
        <div class="second">
        <div class="header"><b>amazon</b><span style="font-size: 50%;padding-top: 15px;padding-bottom: 10px; ">.in</span>
            <button style="margin-left: 10%; width: 50px; height: 10%; margin-top: 8px; padding: 5px">All <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <input type="text" style="width: 40%; height:10%; margin-top: 8px; padding: 5px" placeholder="Search"> 
            <button style="background-color:darkorange; width:50px ;border: none; height: 10%; margin-top: 8px; padding: 5px; font-size: 0.6em;" class="fa fa-search"></button>
        </div>
        <div class="header">
            <div class="dropdown">
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Shop By <br><b>Categories</b> <i class="fa fa-caret-down" style="color: white;"></i></button>
            <div class="dropdown-content">
            </div>
            </div>
            
            <button style="background-color:transparent; border: none; margin-left: 11%; height: 10%; margin-top: 21px; padding: 2px; color:white">Your Amazon.in</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Today's Deals</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Amazon pay</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Sell</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Customer Service</button>
        
            <button style="background-color:transparent; border: none; margin-left: 12%; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Hello.Sign In<br><b>Your Orders</b> <i class="fa fa-caret-down" style="color: white;"></i></button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Try<br><b>Prime</b> <i class="fa fa-caret-down" style="color: white;"></i></button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Your<br><b>Lists</b> <i class="fa fa-caret-down" style="color: white;"></i></button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white; font-size: 0.9em;"><i class="fa fa-shopping-cart" style="color: white;"></i><span style="font-size: 0.5em"><b>Cart</b></span></button>
        </div>
        
            <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="/home/vishakha/Downloads/banner.jpeg" style="width:100%">
            </div>

            <div class="mySlides fade">
              <img src="/home/vishakha/Downloads/stadium.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
              <img src="/home/vishakha/Downloads/note8.jpg" style="width:100%">
            </div>
                
            <div class="mySlides fade">
              <img src="/home/vishakha/Downloads/movie.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
              <img src="/home/vishakha/Downloads/22.jpg" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        
        
            <div style="width: 20%; background-color: #f6eaea; text-align: center;padding-bottom: 10px">
                <div style="padding:10%"> <b>WELCOME</b> </div>
                <div style="padding:5%"><br>Sign in for your best experience </div>
                <button style="background-color:darkorange; border: none; width: 80%; height:30px; margin: auto; margin-top:20%;">Sing In</button>
            </div>
        </div>
            <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              //var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              slides[slideIndex-1].style.display = "block";  
            }
            </script>
    </body>
</html>
