<?php


require "DB_storage.php";
$storage = new DB_storage();
$storage->dajAlbum($_GET['q']);
echo "<p id='nazov'>" . "Album:  ".$storage->dajAlbum($_GET['q']) ."<br>".
" Rok vydania:  ". $_GET['q'] . "</p>";
?>