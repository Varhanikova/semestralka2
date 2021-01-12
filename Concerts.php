<?php
require "DB_storage.php";
require "header.php";
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
    if (($_POST['date']!= '' && $_POST['city'] != '' && $_POST['club'] != '') && $_POST['date'] >= date("Y-m-d") && $storage->isThere($_POST['date']) == '') {
        $a = htmlspecialchars($_POST['date']);
        $b = htmlspecialchars($_POST['city']);
        $c = htmlspecialchars($_POST['club']);
        $storage->createPost($a, $b, $c);
        header("Location: #top");
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
<html>

<div class="napisok col-sm-11">
    <div id="top">
        <h1>Thousand Below tour dates 2021</h1>
        <br>
        <p>Thousand Below is currently touring across 9 countries and has <?= sizeof($concerts) ?> upcoming concerts.
            Their next tour date is at <?= $concerts[0]->getCity() ?>  <?= $concerts[0]->getClub() ?> , after that they'll be at <?= $concerts[1]->getClub() ?> in <?= $concerts[1]->getCity() ?>.
            See all your opportunities to see them live below!</p>
        <br><br>
        <?php   if (isset($_SESSION["name"])) {
            if($_SESSION["name"]=='admin') {?>
        <div class="buttony">
            <a href="?c=add#Add">
                <button> Add new concert</button>
            </a><br>
        </div>
      <?php }} ?>
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
        <?php    if (isset($_SESSION["name"])){
        if($_SESSION["name"]=='admin') {?>
        <a href="<?= "?a=delete" . "&date=" . $conc->getDate() ?>">
            <button type="button">X</button>
        </a>
        <div class="editko">
            <a href="<?= "?b=edit" . "&date2=" . $conc->getDate() . "#Edit" ?> ">
                <i class="fas fa-edit"></i>
            </a>
        </div>
        <?php }} ?>
    </div>
<?php } ?>
<a href="#top" class="toop3">
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
            <input type="text" name="city" >
            <label>Club: </label>
            <input type="text" name="club" >
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
    <?php } if ($_POST['date'] < date("Y-m-d")) { ?>
        <div class="notif alert alert-primary" role="alert">
            Wrong date!
        </div>
    <?php } if ($storage->isThere($_POST['date']) != '' ) {

        ?>
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
    <?php } if ($_POST['newDate'] < date("Y-m-d")) { ?>
        <div class="notif2 alert alert-primary" role="alert">
            Wrong date!
        </div>
    <?php } if ($storage->isThere($_POST['newDate']) != '' && $storage->isThere($_POST['newDate']) != $concert->getDate()) { ?>
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
