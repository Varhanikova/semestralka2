<?php
require "DB_storage.php";
$storage = new DB_storage();
if(isset($_POST['Send1'])) {
    $storage->createPost($_POST['date'], $_POST['city'],$_POST['club']);
}
if(isset($_POST['Send2']))  {
    $storage->editConcert($_POST['date'], $_POST['newDate'], $_POST['newCity'],$_POST['newClub']);
}
if(isset($_POST['Send3']))  {
   $storage->deleteConcert($_POST['date']);
}
$concerts  = $storage->getAll();

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
<div id="top" >
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <img class="logo" src="logo.png" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample06">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Bio.html">Bio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Concerts.php">Concerts<span class="sr-only">(current)</span></a>
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
</div>

<div class="napisok col-sm-11">
    <h1>Thousand Below tour dates 2021</h1>
    <br>
    <p>Thousand Below is currently touring across 9 countries and has 20 upcoming concerts.
        Their next tour date is at Amsterdam Bar & Hall in St. Paul, after that they'll be at Stengade in Copenhagen.
        See all your opportunities to see them live below!</p>
    <br><br>

    <div class="addConcert">
        <label>Add new concert: </label>
        <form method="post">
        <label> Date: </label>
        <input type="text" name="date">
        <label> City, Country: </label>
        <input type="text" name="city">
        <label>Club: </label>
        <input type="text" name="club">
        <input type="submit" name="Send1" value="Send">

        </form>
    </div>

    <div class="editConcert">
        <label> Update concert: </label>
        <form method="post">
            <label> Which data you want to update? (Write date):  </label>
            <input type="text" name="date"><br>
            <label> Updated Date:    </label>
            <input type="text" name="newDate"><br>
            <label> Updated City:    </label>
            <input type="text" name="newCity"><br>
            <label> Updated Club:   </label>
            <input type="text" name="newClub"> <br>
            <input type="submit" name="Send2" value="Send">
        </form>
    </div>

    <div class="deleteConcert">
        <label> Delete concert: </label>
        <form method="post">
            <label> Which data you want to delete? (Write date):  </label>
            <input type="text" name="date"><br>
            <input type="submit" name="Send3" value="Send">
        </form>
    </div>

    <h2>Upcoming concerts:</h2>
</div>
<?php  foreach($concerts as $conc) {   ?>
    <div class="kalendare">
        <svg  viewBox="0 0 16 16" class="bi bi-calendar-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
        <p><?=$conc->getDate()?></p>
        <h1><?=$conc->getCity()?></h1>
        <h2><?=$conc->getClub() ?></h2>
</div>
<?php } ?>

</body>
</html>
