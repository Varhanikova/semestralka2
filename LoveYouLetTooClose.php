<?php
require "header.php";
require "Albums/albumy.php";
$storage2 = new DB_storage();


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
            if(isset($_SESSION["name"])) {?>
        <li>
               <?php if($_SESSION["name"]=='admin') {?>
                <a id="butAl" href="?e=<?= $song->getName()?>" onclick="show('editSong')"><i class='fas fa-edit'></i></a>
                <?php } ?>
                    <a  onclick="showSong('<?= $song->getName()?>','<?= $string?>')" ><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>
            <?php } else { ?>
                <li>
                <a><?= $song->getName() ?></a></li>
                <div id="<?= $string?>" class="lyrics"></div>

            <?php }
        }?>
    </ul>
</div>

</body>
</html>
