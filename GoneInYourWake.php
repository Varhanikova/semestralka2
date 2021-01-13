<?php
require "header.php";
require "albumy.php";
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
        <?php foreach ($songs as $song) {
            ?>
            <?php  $string = str_replace(' ', '', $song->getName()); ?>
            <li><a id="togg"  onclick="showSong('<?= $song->getName()?>','<?= $string?>')" ><?= $song->getName() ?></a></li>
        <div id="<?= $string?>" class="bla"></div>
            <?php } ?>
    </ul>
</div>

</body>
</html>
