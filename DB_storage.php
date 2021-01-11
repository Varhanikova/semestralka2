<?php
declare(strict_types=1);
require_once "Concert.php";
require_once "Song.php";
require_once "Login.php";
class DB_storage
{
    private PDO $pdo;
    private string $user = "root";
    private string $pass = "dtb456";
    private string  $db = "concerts";
    private string $host = "localhost";
    private string $filePath = "DB_storage.php";

    public function __construct()
    {

        $this->pdo = new PDO("mysql:dbname={$this->db};host=$this->host", $this->user, $this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);

    }
public function controlPass($name,$pass): bool {
    $stmt = $this->pdo->query("SELECT heslo FROM prihlasenie WHERE name='$name'");
    if($stmt->fetch()['heslo'] == $pass) {
        return true;
    } else {return false;}
}
    public function control($name,$pass): int {

       // $login = new Login('0', '0');
        $stmt = $this->pdo->query("SELECT * FROM prihlasenie WHERE name='$name'");

        if($stmt->fetch()['name']==$name) {
            if($this->controlPass($name,$pass)) {
                return 0;
            } else {
                return 2;
            }
        } else {
            return 1;
        }


}
    public function createSong(string $name, string $text, string $album){
        $song = new Song($name,$text,$album);
        $this->saveSong($song);
    }
    public function saveSong(Song $song): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO songs(nazov,text,album) VALUES(?,?,?)");
        $stmt->execute([$song->getName(), $song->getText(), $song->getAlbum()]);
    }
    public function vsetkyZAlbumu(string $album): array {
        $stmt = $this->pdo->prepare("SELECT * FROM songs WHERE album=?");
        $stmt->execute([$album]);
        $songs = [];

        while ($row = $stmt->fetch()) {

            $song = new Song($row['nazov'], $row['text'], $row['album']);
            $songs[] = $song;
        }
        return $songs;
    }
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM concerts ORDER BY datum");
        $concerts = [];
        while ($row = $stmt->fetch()) {

            $concert = new Concert($row['datum'], $row['city'], $row['club']);
            $concerts[] = $concert;
        }
        return $concerts;
    }
    public function createPost(string $date, string $city, string $club): void
    {
        $concert = new Concert($date, $city, $club);
        $this->saveConcert($concert);
    }

    public function saveConcert(Concert $concert): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO concerts(datum,city,club) VALUES(?,?,?)");
        $stmt->execute([$concert->getDate(), $concert->getCity(), $concert->getClub()]);
    }

    public function editConcert(string $zaznam, string $newDate, string $newCity, string $newClub): void
    {

        $stmt = $this->pdo->prepare("UPDATE concerts SET datum=?, city=?, club=? WHERE datum=?");
        $stmt->execute([$newDate, $newCity, $newClub, $zaznam]);
    }

    public function deleteConcert(string $which)
    {
        $stmt = $this->pdo->prepare("DELETE FROM concerts WHERE datum=?");
        $stmt->execute([$which]);

    }

    public function getOne(string $datum): Concert
    {
        $concert = new Concert('date', 'city', 'club');
        $stmt = $this->pdo->query("SELECT * FROM concerts WHERE datum='$datum'");
        $row = $stmt->fetch();
        $concert->setDate($row['datum']);
        $concert->setCity($row['city']);
        $concert->setClub($row['club']);

        return $concert;
    }
    public function isThere(string $datumik) {
        $pom ='';
        $stmt = $this->pdo->query("SELECT * FROM concerts WHERE datum='$datumik'");
        $pom = $stmt->fetch()['datum'];
        return $pom;
    }
}