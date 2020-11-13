<?php
declare(strict_types=1);
require_once "Concert.php";
class DB_storage
{
private PDO $pdo;
private $user = "root";
private $pass = "dtb456";
private $db = "concerts";
private $host = "localhost";
private string $filePath = "DB_storage.php";

public function __construct() {

    $this->pdo = new PDO("mysql:dbname={$this->db};host=$this->host",$this->user, $this->pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);

}
public function getAll() : array {
    $stmt = $this->pdo->query("SELECT * FROM concerts ORDER BY datum");
    $concerts = [];
    while($row = $stmt->fetch()) {

        $concert = new Concert($row['datum'],$row['city'], $row['club']);
        $concerts[]=$concert;
    }
    return $concerts;
    }
    public function createPost(string $date, string $city,string $club) : void
    {
        $concert = new Concert($date,$city,$club);
        $this->saveConcert($concert);
    }
public function saveConcert(Concert $concert): void {
    $stmt = $this->pdo->prepare("INSERT INTO concerts(datum,city,club) VALUES(?,?,?)");
    $stmt->execute([$concert->getDate(), $concert->getCity(), $concert->getClub()]);
}
public function editConcert( string $zaznam,string $newDate,string $newCity, string $newClub) : void {

        $stmt = $this->pdo->prepare("UPDATE concerts SET datum=?, city=?, club=? WHERE datum=?");
        $stmt->execute([$newDate, $newCity,$newClub,$zaznam]);
}
public function deleteConcert(string $which) {
    $stmt = $this->pdo->prepare("DELETE FROM concerts WHERE datum=?");
    $stmt->execute([$which]);

}
public function getOne(string $datum) : Concert{
    $concert = new Concert('date','city','club');
    $stmt = $this->pdo->query("SELECT * FROM concerts WHERE datum='$datum'");
    $row = $stmt->fetch();
        $concert->setDate($row['datum']);
        $concert->setCity($row['city']);
        $concert->setClub($row['club']);

    return $concert;
}
}