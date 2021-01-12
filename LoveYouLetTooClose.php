<?php
require "header.php";
require "albumy.php";
$storage2 = new DB_storage();
$song = new Song('','','');

$songs = $storage2->vsetkyZAlbumu('Love You Let Too Close');
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<img class="album1" src="loveyoulettooclose.jpg" alt="album">

<div class="songy ">
    <h2>Songs:</h2>
    <ul>
        <?php foreach ($songs as $song) {
            $a =0; ?>
            <?php  $string = str_replace(' ', '', $song->getName()); ?>
            <li><a id="togg"  onclick="funkcia('<?=$string?>')" ><?= $song->getName() ?></a></li>
            <div id="<?= $string?>" class="bla">
                <p id="p"><?=$song->getText()?></p>
                <br><br>
            </div>
            <?php $a++;} ?>
    </ul>
</div>

</body>
</html>
