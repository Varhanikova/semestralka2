<?php
require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function opacity(str) {
            document.getElementById(str).style.opacity = "0.7";
        }
        function opacityGone(str) {
            document.getElementById(str).style.opacity = "1";
        }

    </script>
</head>
<body>


<h1 class="napis">Welcome to my fanpage of</h1>
<img class=" fotka1 center" src="pics/nazov.png" alt="nazov kapely">
<div class="fotky">
    <a href="LoveYouLetTooClose.php">
        <img id="myPic1" class="fotka col-sm-6" onmousemove="opacity('myPic1')" onmouseleave="opacityGone('myPic1')" src="pics/loveyoulettooclose.jpg" alt="album">
    </a>
    <a href="GoneInYourWake.php">
        <img id="myPic2" class="fotka2 col-sm-6" onmousemove="opacity('myPic2')" onmouseleave="opacityGone('myPic2')" src="pics/gonein.jpg" alt="album">
    </a>
    <a href="LetGoOfYourLove.php">
        <img id="myPic3" class="fotka3 col-sm-6 " onmousemove="opacity('myPic3')" onmouseleave="opacityGone('myPic3')" src="pics/letGoOfYourLove.jpg" alt="album">
    </a>
</div>
</body>
</html>
