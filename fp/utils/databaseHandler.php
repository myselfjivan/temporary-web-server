<?php

include 'utils/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dbname = $_POST["dbname"];
$dbuser = $_POST["dbuser"];
$dbpassword = $_POST["dbpassword"];
if ($_POST["uploadform"] == 1) {
    $dbcheck = mysql_query("SHOW DATABASES LIKE " .$dbname);
    if (empty($dbcheck)) {
        $sql = "CREATE DATABASE " .$dbname;
        if ($conn->query($sql) === TRUE) {
            echo 'Database Created';
            //mysql_query("CREATE USER '" . $_POST["dbusername"] . "'@'localhost' IDENTIFIED BY" . $_POST["dbpassword"] . ";"); //user
            //mysql_query("GRANT ALL ON'" . $_POST["dbname"] . "'.* TO '" . $_POST["dbusername"] . "'@'localhost')");
        } else {
            echo "Error creating database: " . $conn->error;
        }
    } else {
        echo "Database Already Exists";
    }
} else {
    echo 'Form not submitted';
}
$conn->close();
?>