
<!DOCTYPE html>
<html>
<head>
	<title>BRI</title>
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

<nav class="navbar navbar-expand-lg navbar-light bg-success">
        <h1 style="color:white; text-align:center; margin:5px;">
        <img src="https://scontent.fbom3-2.fna.fbcdn.net/v/t1.15752-9/290657372_886572016078640_5349877994475500086_n.png?stp=dst-webp&_nc_cat=104&ccb=1-7&_nc_sid=ae9488&_nc_ohc=nT8yKHobNZAAX-la1jV&_nc_ht=scontent.fbom3-2.fna&uss=34f921510ea6bc9a&odm=bXNhcmlpLndvcmtwbGFjZS5jb20&oe2=62FF56E2&oh=03_AVKqJ9mOMuP110_bWiLchvm-XSZ7OzHziNeTcaVJgu4eJA&oe=62D929D6" alt="Girl in a jacket" width="50" height="50">
        TOS/BRIEF INTRACTOR</h1>
    </nav>
<div class="heading">
    <center>
        <h3>
            <span class="text-slider-items">
                We Are Coming Soon...!
            </span>
            <strong class="text-slider"></strong>
  
        </h3>
</center>
    </div>

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



</body>
</html>