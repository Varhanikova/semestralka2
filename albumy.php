<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".bla").hide();
        });
    </script>
    <script>
        function funkcia(pam) {
            let s = "#"+pam;
            $(s).toggle();
        }
    </script>
</head>