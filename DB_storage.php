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
        $pom = '';
    $stmt = $this->pdo->query("SELECT heslo FROM prihlasenie WHERE name='$name'");
    while ($row = $stmt->fetch()) {
        $pom = $row['heslo'];
    }
    $h = md5($pass);
    if($pom == $h) {
        return true;
    } else {return false;}
}
    public function control($name,$pass): int {
$pom = '';
       // $login = new Login('', '');
        $stmt = $this->pdo->query("SELECT * FROM prihlasenie WHERE name='$name'");
        while ($row = $stmt->fetch()) {
            $pom = $row['name'];
        }
        if($pom==$name) {
            if($this->controlPass($name,$pass)) {
                return 0;
            } else {
                return 2;
            }
        } else {
            return 1;
        }
}
public function saveLogin($name, $heslo): bool{
        $log = new Login($name,$heslo);
        if($this->control($name,$heslo)==1) {
            $stmt = $this->pdo->prepare("INSERT INTO prihlasenie(name,heslo) VALUES(?,?)");
            $stmt->execute([$log->getMeno(), $log->getHeslo()]);
            return true;
        } else {
            return false;
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
    public function textSongu(string $song): string {
        $stmt = $this->pdo->prepare("SELECT text FROM songs WHERE nazov=?");
        $stmt->execute([$song]);
        $text='';
        while ($row = $stmt->fetch()) {
            $text = $row['text'];
        }
        return $text;
    }
    public function kolko(): string{
        $stmt = $this->pdo->query("SELECT COUNT(DISTINCT (city)) as pocet FROM concerts");
        while ($row = $stmt->fetch()) {
          $pocet = $row['pocet'];
        }

        return $pocet;
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
        $stmt = $this->pdo->prepare("SELECT * FROM concerts WHERE datum=?");
        $stmt->execute([$datum]);
        $row = $stmt->fetch();
        $concert->setDate($row['datum']);
        $concert->setCity($row['city']);
        $concert->setClub($row['club']);

        return $concert;
    }
    public function isThere(string $datumik) {
        $pom ='';
        $stmt = $this->pdo->query("SELECT * FROM concerts WHERE datum='$datumik'");
        while ($row = $stmt->fetch()) {
            $pom = $row['datum'];
        }

        return $pom;
    }
}