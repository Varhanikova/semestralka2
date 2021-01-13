<?php


require "DB_storage.php";
$storage = new DB_storage();
//$storage->dajAlbum($_GET['q']);

if($_GET['q'] == '0'){
    $rok = '2017';
} elseif ($_GET['q'] == '1'){$rok = '2019';} else {
    $rok = '2020';
}
echo "<p id='nazov'>" . "Album:  ".$storage->dajAlbum($rok) ."<br>".
    " Rok vydania:  ". $rok. "</p>";
?>