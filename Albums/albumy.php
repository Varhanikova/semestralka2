
<!DOCTYPE html>
<html lang="en">
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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



</body>