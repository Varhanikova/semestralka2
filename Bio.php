<?php require "header.php";
$st = new DB_storage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        document.getElementById("bio").className += " active";
    </script>
</head>
<body>
<img class="fotka5" src="pics/boys.jpg" alt="chalosi">
<div class="bioo">
    <p> Thousand Below is an American post-hardcore band from Southern California, formed in 2016.
        They are currently signed to Rise Records.</p>
    <p>Formed by vocalist James DeBerg after his departure from his previous band Outlands, the band signed for Rise
        Records and released their debut album "The Love You Let Too Close". After the album's release, they began
        touring heavily across the United States and Europe supporting bands such as Veil of Maya, Devil Wears Prada and
        Dance Gavin Dance.
    </p>
    <h1>Band Members(current):</h1>
    <p>James DeBerg - Lead vocals (2016–present)
        Josh Thomas - Guitar (2016–present)
        Josh Billimoria - Bass (2016–present)
        Max Santoro - Drums (2019–present)</p>
    <h1> Discography:</h1>
    <h2> Studio albums: </h2>
    <div id='showAlbum'>


    </div><br>
    <input type="button" onclick="previous()" value="<<">
    <input type="button" onclick="next()" value=">>">
    <p id="moreAlbums"> Clik here to see more albums</p>
    <script>
            var i = 0;
            displayAl(i);
            function displayAl(i) {
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("showAlbum").innerHTML = this.responseText;
                    }
                };
                var a = i.toString();
                xhttp.open("GET", "Albums/dajAlbum.php?q="+ a, true);
                xhttp.send();
            }
            function next() {
                if (i < 2) {
                    i++;
                        displayAl(i);
                }
            }
            function previous() {
                if (i > 0) {
                    i--;
                    displayAl(i);
            }}
    </script>
</div>
</body>
</html>
