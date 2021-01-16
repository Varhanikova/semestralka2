

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        document.getElementById("dropdown06").className += " active";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>function hide(str)
        {
            document.getElementById(str).style.display="none";
            document.documentElement.scrollTop = 0;

        }function show(str){
            document.getElementById(str).style.display = "block";
        }</script>
    <script>
        function showSong(str,id) {

            var xhttp;
if(document.getElementById(id).textContent == "") {
                if (str == "") {
                    document.getElementById(id).innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(id).innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "Albums/dajLyrics.php?q="+str, true);
                xhttp.send();
          } else {
    document.getElementById(id).innerHTML = "";
    }}
    </script>

</head>
<body>
<?php
$storageAl = new DB_storage();

if (isset($_POST['SendS'])) {
    $name = str_replace(" ","",$_POST['name']);
    $text = str_replace(" ","",$_POST['text']);
    if ($_POST['name']!= '' && $_POST['text'] != ''  && $name !='' && $text !='') {
        $a = htmlspecialchars($_POST['name']);
        $b = htmlspecialchars($_POST['text']);
        $c = $_POST['album'];
        $storageAl->editSong($_POST['name'],$_POST['text']);
    }
}
?>
<?php
if(isset($_SESSION["name"]) && isset($_GET['e'])!='') {
    if($_SESSION["name"]=='admin') {
        ?>
        <div class="editSong" id="editSong">
            <label>Add new song: </label>
            <form method="post">
                <label> Album: </label>
                <input  type="text" name="album" id="album" value="album">
                <label> Name: </label>
                <input  type="text" name="name" id="name" value="<?= ($_GET['e'])?>"> <br>
                <label> Text: </label>
                <textarea rows="10" cols="50" name="text" id="text" ><?= $storageAl->textSongu($_GET['e'])?></textarea>
                <input type="submit" name="SendS" value="Send">
                <button type="button" onclick="hide('editSong')" >Cancel</button>
            </form>
        </div>
    <?php }
}
?>
<script>
    var str = ' ';
    if (window.location.href.indexOf("GoneInYourWake") > -1) {
        str = 'Gone In Your Wake';
    } else if(window.location.href.indexOf("LoveYouLetTooClose") > -1) {
        str = 'Love You Let Too Close';
    } else {str = 'Let Go Of Your Love';}
    document.getElementById('album').value = str;
    </script>
</body>

