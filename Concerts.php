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
    if (($_POST['date']!= '' && $_POST['city'] != '' && $_POST['club'] != '') && $_POST['date'] >= date("Y-m-d") && $storage->isThere($_POST['date']) == '' ) {
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
<html>

<div class="napisok col-sm-11">
    <div id="top">
        <h1>Thousand Below tour dates 2021</h1>
        <br>
        <p>Thousand Below is currently touring across <?= $storage->kolko() ?> cities and has <?= sizeof($concerts) ?> upcoming concerts.
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
    <div class="kalendare" id="kalendarik">
        <div id="kalendarik1" class="kalendarik1">
        </div>

    </div>
<br>
<input id="prev" onclick="previous()" type="button" value="Previous" />
<input id="next" onclick="next()" type="button" value="Next" />

<script>
    var i = 1;
    var size = parseInt('<?= sizeof($concerts) ?>');
    displayResults(i);
    function displayResults(i) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kalendarik").innerHTML = this.responseText;
            }
        };
        var a = i.toString();
        xhttp.open("GET", "koncerty.php?q="+ a, true);
        xhttp.send();
    }
    function next() {
        if (i < size-4 ){
            i+=5;
            displayResults(i);
        }
    }
    function previous() {
        if (i > 1) {
            i-=5;
            displayResults(i);
        }}
</script>

<div id="Add" class="DBConcerts">
    <?php
    if (isset($_GET['c']) == 'add' && isset($_SESSION["name"]) ) { ?>
    <div class="addConcert">
        <label>Add new concert: </label>
        <form method="post">
            <label> Date: </label>
            <input type="date" name="date" id="date">
            <label> City, Country: </label>
            <input type="text" name="city" id="city">
            <label>Club: </label>
            <input type="text" name="club" id="club">
            <input onclick="kontrola()" type="submit" name="Send1" value="Send">
        </form>
    </div>
</div>

<?php } ?>

<?php
if (isset($_POST['Send1'])) {
    if ($_POST['date'] < date("Y-m-d")) { ?>
        <div class="notif alert alert-primary" role="alert">
            Wrong date!
        </div>
    <?php } if ($storage->isThere($_POST['date']) != '' ) {

        ?>
        <div class="notif alert alert-primary" role="alert">
            You can't use this date
        </div>
    <?php }
    if($_POST['date'] == '' || $_POST['city'] == '' || $_POST['club'] == '') { ?>
        <div class="notif alert alert-primary" role="alert">
            Empty!
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
