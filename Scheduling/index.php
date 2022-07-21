
<!DOCTYPE html>
<html>
<head>
	<title>Scheduling</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- <script src="js/jquery.mim.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/
   jquery/3.5.1/jquery.min.js">
   <link rel="stylesheet" href="style.css" />
</script>
</head>
<body>
<center>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
        <h1 style="color:white; text-align:center; margin:5px;">TOS/SCHEDULING</h1>
    </nav>
<div class="heading">
        <h3>
            <span class="text-slider-items">
                We Are Coming Soon...!
            </span>
            <strong class="text-slider"></strong>
  
        </h3>
    </div>
</center>


<header>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="https://cdn.pixabay.com/photo/2017/10/24/10/30/business-2884023_960_720.jpg" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line"></div>
                                <h2>Teimagine Digital Experience with</h2>
                                <h1>Start-ups and solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>                    
                <div class="item">
                    <img src="https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line animated bounceInLeft"></div>
                                <h2>Reimagine Digital Experience with</h2>
                                <h1>Intelligent solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>                
                <div class="item">
                    <img src="https://cdn.pixabay.com/photo/2017/05/04/16/37/meeting-2284501_960_720.jpg" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line animated bounceInLeft"></div>
                                <h2>Peimagine Digital Experience with</h2>
                                <h1>Intelligent Solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </header>
    <!-- Import typed.min.js file from typed.js folder -->
    <script src=
        "./typed.js-master/lib/typed.min.js">
    </script>
      
    <!-- Add jquery cdn -->
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
  
    <!-- Add this script for successful 
        implementation of typed.js  -->
    <script>
        if ($(".text-slider").length == 1) {
              
            var typed_strings = 
                $(".text-slider-items").text();
  
            var typed = new Typed(".text-slider", {
                strings: typed_strings.split(", "),
                typeSpeed: 50,
                loop: true,
                backDelay: 900,
                backSpeed: 30,
            });
        }
    </script>

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    mouseDrag:false,
    autoplay:true,
    animateOut: 'slideOutUp',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
    </script>

</body>
</html>