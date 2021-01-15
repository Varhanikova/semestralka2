<?php
require "header.php";
require "Albums/albumy.php";
$storage1 = new DB_storage();
$song = new Song('','','');
$songs = $storage1->vsetkyZAlbumu('Let Go Of Your Love');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<img class="album1" src="pics/letGoOfYourLove.jpg" alt="album">

<div class="songy ">
    <h2>Songs:</h2>
    <ul>
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
