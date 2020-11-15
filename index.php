<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thousand Below</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <img class="logo" src="logo.png" alt="logo  kapely">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="Bio.html">Bio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="Concerts.php">Concerts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Albums</a>
                <div class="dropdown-menu" aria-labelledby="dropdown06">
                    <a class="dropdown-item" href="LoveYouLetTooClose.html">The Love You Let Too Close</a>
                    <a class="dropdown-item" href="GoneInYourWake.html">Gone In Your Wake</a>
                    <a class="dropdown-item" href="LetGoOfYourLove.html">Let Go Of Your Love</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<h1 class="napis">Welcome to my fanpage of</h1>
<img class=" fotka1 center" src="nazov.png" alt="nazov kapely">
<div class="fotky">
    <a href="LoveYouLetTooClose.html">
        <img class="fotka col-sm-6"  src="loveyoulettooclose.jpg" alt="album">
    </a>
    <a href="GoneInYourWake.html">
        <img class="fotka2 col-sm-6"   src="gonein.jpg" alt="album">
    </a>
    <a href="LetGoOfYourLove.html">
        <img class="fotka3 col-sm-6 " src="letGoOfYourLove.jpg" alt="album">
    </a>
</div>
</body>
</html>