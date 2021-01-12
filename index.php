<?php
require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function opacity() {
            document.getElementById("myPic").style.opacity = "0.7";
        }
        function opacityGone() {
            document.getElementById("myPic").style.opacity = "1";
        }

    </script>
</head>
<body>


<h1 class="napis">Welcome to my fanpage of</h1>
<img class=" fotka1 center" src="nazov.png" alt="nazov kapely">
<div class="fotky">
    <a href="LoveYouLetTooClose.php">
        <img id="myPic" class="fotka col-sm-6" onmousemove="opacity()" onmouseleave="opacityGone()" src="loveyoulettooclose.jpg" alt="album">
    </a>
    <a href="GoneInYourWake.php">
        <img id="myPic" class="fotka2 col-sm-6" onmousemove="opacity()" onmouseleave="opacityGone()" src="gonein.jpg" alt="album">
    </a>
    <a href="LetGoOfYourLove.php">
        <img id="myPic"  class="fotka3 col-sm-6 " onmousemove="opacity()" onmouseleave="opacityGone()" src="letGoOfYourLove.jpg" alt="album">
    </a>
</div>
</body>
</html>
