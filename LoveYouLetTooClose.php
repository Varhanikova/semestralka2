<?php
require "header.php";
require "Albums/albumy.php";
$storage2 = new DB_storage();
$song = new Song('','','');

$songs = $storage2->vsetkyZAlbumu('Love You Let Too Close');
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<img class="album1" src="pics/loveyoulettooclose.jpg" alt="album">

<div class="songy ">
    <h2>Songs:</h2>
    <ul>
        <?php foreach ($songs as $song) {
            ?>
            <?php  $string = str_replace(' ', '', $song->getName());
            if(isset($_SESSION["name"])) {
                ?>
                <li><a  onclick="showSong('<?= $song->getName()?>','<?= $string?>')" ><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>
            <?php } else { ?>
                <li><a><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>

            <?php }
        }?>
    </ul>
</div>

</body>
</html>
