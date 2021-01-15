<?php
require "header.php";
require "Albums/albumy.php";
$storage3 = new DB_storage();
$songs = $storage3->vsetkyZAlbumu('Gone In Your Wake');
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<img class="album1" src="pics/gonein.jpg" alt="album">
<div class="songy ">
    <h2>Songs:</h2>
    <ul id ="sem" onload="load()">
        <?php foreach ($songs as $song) {
            ?>
            <?php  $string = str_replace(' ', '', $song->getName());
            if(isset($_SESSION["name"])) {
                ?>
                <li><a onclick="showSong('<?= $song->getName()?>','<?= $string?>')" ><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>
            <?php } else { ?>
                <li><a ><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>

            <?php }
        }?>
    </ul>
</div>

</body>
</html>
