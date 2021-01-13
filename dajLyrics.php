<?php
require "DB_storage.php";
$storage = new DB_storage();

echo $storage->textSongu($_GET['q']);
?>