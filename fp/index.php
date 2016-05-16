<!DOCTYPE html>
<head id="head">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Temporary Web Server</title>
    <script src="main.js"></script>
<div>
    <h5><a href="database.php">Create Database </a>
</div>
    <style type='text/css'>
        #holder {
            font-family: Arial;
            width: 500px;
            margin: 100px auto;
            text-align:center;
        }

        #output {
            padding-top: 20px;
            font-size: 11px;
        }
    </style>

    <link rel="shortcut icon" id="favicon" type="image/png" href="icon.gif">
</head>
<body>
    <div id="holder">
        <input type="file" id="files" name="files[]" multiple="" webkitdirectory="">​
        <div id="output"></div>
    </div>
</body>
</html>
<?php
$directory = "uploads/";

function cmp($a, $b) {
    if (filemtime($a) == filemtime($b))
        return 0;

    return (filemtime($a) > filemtime($b)) ? -1 : 1;
}

//$files = scandir($directory);
$files = glob($directory . "*", GLOB_ONLYDIR);
usort($files, "cmp");

//print each file name
foreach ($files as $file) {
    //check to see if the file is a folder/directory
    if (is_dir($file)) {
        //str_replace(find,replace,string,count);
        $tempUrl = str_replace("uploads/", "", $file);
        echo "<br><a href=http://192.168.90.131/temporaryWebServer/fp/uploads/" . rawurlencode($tempUrl) . " target=_blank>" . $tempUrl . "</a>";
    }
}
?>