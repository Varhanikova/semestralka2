<?php
require "../DB_storage.php";
session_start();
$storagee = new DB_storage();
$concerts = $storagee->getAll();
$pocet = sizeof($concerts);
$vypis = $_GET['q'];
$a=$vypis+4;
$limit=0;
if($pocet-$a>0) {
    $limit=$vypis+4;
} else {
    $kolko = $pocet-$vypis+1;
    $limit=$pocet;
}
    for ($i = $vypis - 1; $i < $limit; $i++) {

       echo "<svg viewBox='0 0 16 16' class='bi bi-calendar-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z'/>
            </svg>" .
        "<p>". $concerts[$i]->getDate(). "</p>" .
        "<h1>" . $concerts[$i]->getCity(). "</h1>".
        "<h2 >". $concerts[$i]->getClub() ."</h2>";


        if (isset($_SESSION["name"])){
            if($_SESSION["name"]=='admin') {
              echo " <a href=" . "?a=delete" . "&date=" .$concerts[$i]->getDate() .">" .
                   " <button type='button'>" . "X" . "</button>" . " </a>".
                "<div class='editko'>" .
                    "<a href=". "?b=edit" . "&date2=" . $concerts[$i]->getDate() . "#Edit" . ">".
                       " <i class='fas fa-edit'></i>" .
                   " </a>".
               " </div>" ;
            }}

}


?>