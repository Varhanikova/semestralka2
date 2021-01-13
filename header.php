<?php
require_once "DB_storage.php";
require_once "Login.php";

$storage = new DB_storage();

session_start();

if (isset($_POST['Send'])) {

    if ($_POST['username']!= '' && $_POST['psw']!='' &&$storage->control($_POST['username'],$_POST['psw'])==0) {
      $_SESSION["name"] = $_POST['username'];
    }
}
if(isset($_POST['reg'])) {
    if($storage->saveLogin($_POST['username'],$_POST['psw1'])==true) {

    }
}
if(isset($_POST['logout'])) {
    unset($_SESSION["name"]);
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thousand Below</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/e7858c52b6.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e060c06e60.js" crossorigin="anonymous"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="top">
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <img class="logo" src="logo.png" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
                aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample06">
            <ul class="navbar-nav mr-auto" id="idecko">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Bio.php">Bio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Concerts.php">Concerts</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Albums</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item" href="LoveYouLetTooClose.php">The Love You Let Too Close</a>
                        <a class="dropdown-item" href="GoneInYourWake.php">Gone In Your Wake</a>
                        <a class="dropdown-item" href="LetGoOfYourLove.php">Let Go Of Your Love</a>
                    </div>
                </li>
            </ul>
            <?php
            if (isset($_SESSION["name"])) {
                ?>
                <div class="topnav">
                    <div class="login-container">
                        <form method="post">
                            <button type="submit" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
         <?php   } else { ?>

            <div class="topnav">

                <div class="login-container">
                    <form method="post">
                        <input type="text" placeholder="Username" name="username">
                        <input type="password" placeholder="Password" name="psw">
                        <button type="submit" name="Send" class="fas fa-sign-in-alt" id="login" ></button>
                    </form>
                </div>
                <a class="open-button" onclick="openForm()">Click here for registration! </a>
                <div class="form-popup" id="myForm">
                    <form method="post" class="form-container">
                        <h1>Registration</h1>

                        <label for="email"><b>Username</b></label>
                        <input type="text" placeholder="Enter username" name="username" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw1" required>
                        <button type="submit" name="reg" class="btn">Register</button>
                        <button type="submit" class="btn cancel"  onclick="closeForm()">Close</button>
                    </form>
                </div>
            </div>
           <?php } ?>

        </div>
    </nav>
</div>

<?php
if (isset($_POST['Send'])) {
    if ($_POST['username'] == '' || $_POST['psw'] == '') {
        ?>
        <div class="notif3 alert alert-primary" role="alert">
            Niečo si nedoplnil !
        </div>
    <?php }  if ($storage->control($_POST['username'],$_POST['psw'])==1) { ?>
        <div class="notif3 alert alert-primary" role="alert">
            zlé meno !
        </div>
    <?php }if ($storage->control($_POST['username'],$_POST['psw'])==2) { ?>
        <div class="notif3 alert alert-primary" role="alert">
            zlé heslo !
        </div>
    <?php }
}



?>