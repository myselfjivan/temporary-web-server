<?php
$path = "/var/www/html/temporaryWebServer/" . $_POST["path"];
mkdir($path, 0777, true);
?>
<html>
    <body>
        <form action="" method="POST">
            <input type="text" name="path" value="" required>
            <input type="submit">
        </form>
    </body>
</html>