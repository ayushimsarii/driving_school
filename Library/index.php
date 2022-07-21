
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
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

<div class="heading">
        <h1>TOS/LIBRARY</h1>
        <h3>
            <span class="text-slider-items">
                We Are Coming Soon...!
            </span>
            <strong class="text-slider"></strong>
  
        </h3>
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
<!--Head Navbar-->
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/DRIVING_SCHOOL/header.php';
?>
<!--Coming Soon-->


<!-- Next and Previous Button-->

 <!-- <div class="container-fluid" id="next-previous">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="sim.php">Next</a></button>
    </div><br><br> -->

<?php
include_once 'footer.php';
?>
</body>
</html>