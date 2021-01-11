<?php
require "header.php";

$storage3 = new DB_storage();
$song = new Song('','','');
$songs = $storage3->vsetkyZAlbumu('Gone In Your Wake');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<img class="album1" src="gonein.jpg" alt="album">
<div class="songy ">
    <h2>Songs:</h2>
    <ul>
        <?php foreach ($songs as $song) { ?>
            <li><a href="#<?= $song->getName() ?>">1. <?= $song->getName() ?></a></li>
        <?php } ?>
    </ul>
</div>

<?php foreach ($songs as $song) { ?>
    <div id="<?= $song->getName() ?>" class="bla">
        <h1><?= $song->getName() ?></h1>
        <h2>Lyrics:</h2>
        <p> <?= $song->getText() ?>
        </p>
        <a href="#top" class="toop"> Back to top<br></a>
        <br><br>
    </div>
<?php } ?>

</body>
</html>
