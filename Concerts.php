<?php
require "DB_storage.php";
$storage = new DB_storage();
$concert = new Concert('', '', '');
if (isset($_GET['a']) == 'delete') {
    $date = $_GET['date'];
    $storage->deleteConcert($date);
    header("Location: Concerts.php?#top");
}
if (isset($_GET['b']) == 'edit') {
    $date1 = $_GET['date2'];
    $concert = $storage->getOne($date1);
}
if (isset($_POST['Send1'])) {
    if (($_POST['date'] != '' && $_POST['city'] != '' && $_POST['club'] != '') && $_POST['date'] >= date("Y-m-d") && $storage->isThere($_POST['date']) == '') {
        $a = htmlspecialchars($_POST['date']);
        $b = htmlspecialchars($_POST['city']);
        $c = htmlspecialchars($_POST['club']);
        $storage->createPost($a, $b, $c);
        header("Location: Concerts.php?#top");
    }
}
if (isset($_POST['Send2'])) {
    if (($_POST['newDate'] != '' && $_POST['newCity'] != '' && $_POST['newClub'] != '') && $_POST['newDate'] >= date("Y-m-d") && (($storage->isThere($_POST['newDate']) == '') || ($storage->isThere($_POST['newDate']) == $concert->getDate()))) {
        $a = htmlspecialchars($_POST['newDate']);
        $b = htmlspecialchars($_POST['newCity']);
        $c = htmlspecialchars($_POST['newClub']);
        $storage->editConcert($concert->getDate(), $a, $b, $c);
        header("Location: Concerts.php?#top");
    }
}
$concerts = $storage->getAll();

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
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Albums</a>
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
    <div id="top">
        <h1>Thousand Below tour dates 2021</h1>
        <br>
        <p>Thousand Below is currently touring across 9 countries and has <?= sizeof($concerts) ?> upcoming concerts.
            Their next tour date is at <?= $concerts[0]->getCity() ?>  <?= $concerts[0]->getClub() ?> , after that
            they'll be at <?= $concerts[1]->getClub() ?> in
            <?= $concerts[1]->getCity() ?>.
            See all your opportunities to see them live below!</p>
        <br><br>
        <div class="buttony">
            <a href="?c=add#Add">
                <button> Add new concert</button>
            </a><br>
        </div>

        <h2>Upcoming concerts:</h2>
    </div>
</div>

<?php foreach ($concerts as $conc) { ?>
    <div class="kalendare">
        <div class="kalendarik1">
            <svg viewBox="0 0 16 16" class="bi bi-calendar-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </div>
        <p><?= $conc->getDate() ?></p>
        <h1><?= $conc->getCity() ?></h1>
        <h2><?= $conc->getClub() ?></h2>
        <a href="<?= "?a=delete" . "&date=" . $conc->getDate() ?>">
            <button type="button">X</button>
        </a>
        <div class="editko">
            <a href="<?= "?b=edit" . "&date2=" . $conc->getDate() . "#Edit" ?> ">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    </div>
<?php } ?>
<a href="Concerts.php" class="toop3">
    <button>Back to the top ↑</button>
</a>
<div id="Add" class="DBConcerts">
    <?php
    if (isset($_GET['c']) == 'add') { ?>
    <div class="addConcert">
        <label>Add new concert: </label>
        <form method="post">
            <label> Date: </label>
            <input type="date" name="date">
            <label> City, Country: </label>
            <input type="text" name="city">
            <label>Club: </label>
            <input type="text" name="club">
            <input type="submit" name="Send1" value="Send">
        </form>
    </div>
</div>
<?php } ?>
<?php
if (isset($_POST['Send1'])) {
    if (($_POST['date'] == '' || $_POST['city'] == '' || $_POST['club'] == '')) {

        ?>
        <div class="notif alert alert-primary" role="alert">
            Something is missing there..
        </div>
    <?php } elseif ($_POST['date'] < date("Y-m-d")) { ?>
        <div class="notif alert alert-primary" role="alert">
            Wrong date!
        </div>
    <?php } elseif ($storage->isThere($_POST['date']) != '') { ?>
        <div class="notif alert alert-primary" role="alert">
            You can't use this date
        </div>
    <?php }
}
if (isset($_POST['Send2'])) {
    if ($_POST['newDate'] == '' || $_POST['newCity'] == '' || $_POST['newClub'] == '') {
        ?>
        <div class="notif2 alert alert-primary" role="alert">
            Something is missing there..
        </div>
    <?php } elseif ($_POST['newDate'] < date("Y-m-d")) { ?>
        <div class="notif2 alert alert-primary" role="alert">
            Wrong date!
        </div>
    <?php } elseif ($storage->isThere($_POST['newDate']) != '' && $storage->isThere($_POST['newDate']) != $concert->getDate()) { ?>
        <div class="notif2 alert alert-primary" role="alert">
            You can't use this date
        </div>
    <?php }
} ?>
<div id="Edit" class="DBConcerts">
    <?php if (isset($_GET['b']) == 'edit') { ?>
        <div class="editConcert">
            <label> Update concert: </label>
            <form method="post">
                <label> Updated Date:</label>
                <input type="date" name="newDate" value="<?= $concert->getDate() ?>">
                <label> Updated City:</label>
                <input type="text" name="newCity" value="<?= $concert->getCity() ?>">
                <label> Updated Club:</label>
                <input type="text" name="newClub" value="<?= $concert->getClub() ?>">
                <input type="submit" name="Send2" value="Send">
            </form>
        </div>
    <?php } ?>
</div>
</body>
</html>
