<?php
include 'header.php';

include 'utils/config.php';
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$directory = "sql/";

if ($_POST["uploadform"] == 1) {
    $_SESSION["dbname"] = $_POST["dbname"];
    $_SESSION["dbusername"] = $_POST["dbusername"];
    $_SESSION["dbpassword"] = $_POST["dbpassword"];
    $createQ = "CREATE USER '{$_SESSION["dbusername"]}'@'localhost' IDENTIFIED BY '{$_SESSION["dbpassword"]}'";
    $grantQ = "GRANT  ALL ON  '{$_SESSION["dbname"]}' TO '{$_SESSION["dbusername"]}'@'localhost' WITH GRANT OPTION";
    $dbcheck = mysql_query("SHOW DATABASES LIKE " . $_SESSION["dbname"]);
    if (empty($dbcheck)) {
        $sql = "CREATE DATABASE " . $_SESSION["dbname"];
        if ($conn->query($sql) === TRUE) {
            $database_create_success = 'Database Created';
            if ($conn->query($createQ)) {
                $user_create_success = 'user created<br/>';
                if ($conn->query($grantQ)) {
                    $permission_success = 'permissions granted<br/>';
                } else {
                    $db_permission_error = 'permissions query failed:' . mysql_error() . '<br/>';
                }
            } else {
                $db_user_error = 'user create query failed:' . mysql_error() . '<br/>';
            }
        } else {
            $database_error = "Error creating database: " . $conn->error;
        }
    } else {
        $database_exists = "Database Already Exists";
    }
} else {
    $form_error = 'Form not submitted';
}
if (isset($_POST["import"])) {
    sql_import();
}
$conn->close();
?>
<div class="container">
    <div class="row">
        <h2>Database Settings for your Application</h2>
        <div class="alert alert-warning">
            <h4>Be ready with the .sql file</h4>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-4">
                <h4 class="page-header"><strong>Step 1:</strong> Upload sql file</h4>
                <form role="form" action="sqlUpload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group float-label-control">
                        <label>Sql File</label>
                        <input name="file" type="file" required>
                    </div>
                    <div class="form-group float-label-control">
                        <input type="submit" class="btn btn-primary btn-lg btn-block">
                    </div>
                </form>
                <div>
                </div>
            </div>

            <div class="col-sm-4">

                <h4 class="page-header"><strong>Step 2:</strong> Database Configurations</h4>
                <form role="form" action="" method="POST">
                    <input type="hidden" name="uploadform" value="1"/>
                    <div class="form-group float-label-control">
                        <label for="">Database Username</label>
                        <input name="dbusername" type="text" class="form-control" placeholder="Username" required>
                        <label for="">
                        </label>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Database Password</label>
                        <input name="dbpassword" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Database Name</label>
                        <input name="dbname" type="text" class="form-control" placeholder="Databae Name" required>
                        <label for=""><?php
                            echo $import_success;
                            ?>
                        </label>
                    </div>

                    <div class="form-group float-label-control">
                        <input type="submit" class="btn btn-primary btn-lg btn-block">
                    </div>
                </form>

            </div>

            <div class="col-sm-4">
                <h4 class="page-header"><strong>Step 3:</strong> Import Database</h4>
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group float-label-control">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="import">
                    </div>
                </form>
                <div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php

function sql_import() {
    $filename = "sql/" . $_SESSION["sqlfile"];
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_database = $_SESSION["dbname"];

    mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
    mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

    $templine = '';
    $lines = file($filename);
    foreach ($lines as $line) {
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';') {
            mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
            $templine = '';
        }
    }
    $import_success = "Tables imported successfully";
}
?>
<?php
include 'footer.php';
?>