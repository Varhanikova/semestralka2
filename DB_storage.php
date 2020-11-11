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
    $stmt = $this->pdo->query("SELECT * FROM concerts");
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
}