<?php
include 'header.php';
?>
<br>
<br>
<!DOCTYPE html>
<head id="head">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Temporary Web Server</title>
    <script src="main.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Select the Application Directory to upload to server</h1>
                        <div id="holder">
                            <input type="file" id="files" name="files[]" multiple="" webkitdirectory="">​
                            <div id="output"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Instructions
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>1. If you have static Application, upload it <a href="index.php">here.</a></li>
                            <li>2. If you have dynamic application, first off all create database configuration <a href="database.php">here.</a></li>
                            <li>3. Make all the directory readable to browser.</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h2>All Available Sites</h2>
        <?php
        $directory = "uploads/";

        function cmp($a, $b) {
            if (filemtime($a) == filemtime($b))
                return 0;

            return (filemtime($a) > filemtime($b)) ? -1 : 1;
        }

        $files = glob($directory . "*", GLOB_ONLYDIR);
        usort($files, "cmp");

        foreach ($files as $file) {
            if (is_dir($file)) {
                $tempUrl = str_replace("uploads/", "", $file);


                echo "<br><a href=http://localhost/temporaryWebServer/fp/uploads/" . rawurlencode($tempUrl) . " target=_blank>" . $tempUrl . "</a>";
            }
        }
        ?>
    </ul>
</div>
</body>
</html>
<?php
include 'footer.php';
?>