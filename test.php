<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style type="text/css">
	#body{
    color:red;
    background:grey;
}
.blur{
    position:absolute;
    top:0;left:0;right:0;bottom:0;
    background:rgba(0,0,0,0.5);
    display:none;
}
#sh{
    position:absolute;
    display:none;
    top:50px;left:50px;bottom:50px;right:50px;
    background:rgba(255,0,0,0.5);
}
</style>
<body>
<div id='body'>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
<button class="btn">Click Here</button>
</div>
<div class="blur"></div>
<div id='sh'>
<button id="close">X</button>
GET MORE FROM MINI X STYLE
</div>

<script type="text/javascript">
	window.onload = function() {
var pup = document.getElementsByClassName('btn')[0];
pup.onclick=function(){
document.getElementById('sh').style.display="block";
document.getElementsByClassName('blur')[0].style.display="block";
};
var close = document.getElementById('close');
close.onclick=function(){
document.getElementById('sh').style.display="none";
document.getElementsByClassName('blur')[0].style.display="none";
};
};
</script>
</body>
</html>