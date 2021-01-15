<?php


require "../DB_storage.php";
$storage = new DB_storage();
$rok ='';
$pic = '';

if($_GET['q'] == '0'){
    $rok = '2017';
    $pic = 'loveyoulettooclose';
} elseif ($_GET['q'] == '1'){$rok = '2019';$pic = 'gonein';} else {
    $rok = '2020';$pic = 'letGoOfYourLove';
}
$src = "pics/" . $pic. ".jpg";
echo "<img class='bioAlbums' src=$src alt='nazov kapely'>" . "<br>"
    ."<p id='nazov'>" . $storage->dajAlbum($rok) .
    " (". $rok. ")"."</p>"

;
?>