<?php
include 'header.php';
?>
<br>
<br>
<?php
include 'utils/config.php';
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dbname = $_POST["dbname"];
$dbuser = $_POST["dbusername"];
$dbpassword = $_POST["dbpassword"];
$createQ = "CREATE USER '{$dbuser}'@'localhost' IDENTIFIED BY '{$dbpassword}'";
$grantQ = "GRANT  ALL ON  '{$dbname}' TO '{$dbuser}'@'localhost' WITH GRANT OPTION";

if ($_POST["uploadform"] == 1) {
    $dbcheck = mysql_query("SHOW DATABASES LIKE " . $dbname);
    if (empty($dbcheck)) {
        $sql = "CREATE DATABASE " . $dbname;
        if ($conn->query($sql) === TRUE) {
            echo 'Database Created';
            if ($conn->query($createQ)) {
                echo 'user created<br/>';
                if ($conn->query($grantQ)) {
                    echo 'permissions granted<br/>';
                } else {
                    echo 'permissions query failed:' . mysql_error() . '<br/>';
                }
            } else {
                echo 'user create query failed:' . mysql_error() . '<br/>';
            }
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
<div class="container">
    <div class="row">
        <h2>Database Settings for your Application</h2>
        <div class="alert alert-warning">
            <h4>Be ready with the .sql file</h4>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-8">

                <h4 class="page-header">Database Configurations</h4>
                <form role="form" action="" method="POST">
                    <input type="hidden" name="uploadform" value="1"/>
                    <div class="form-group float-label-control">
                        <label for="">Database Username</label>
                        <input name="dbusername" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Database Password</label>
                        <input name="dbpassword" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Database Name</label>
                        <input name="dbname" type="text" class="form-control" placeholder="Databae Name" required>
                    </div>
                    <!---
                    <div class="form-group float-label-control">
                        <label>Sql File</label>
                        <input name="dbfile" type="file" required>
                    </div>
--->
                    <div class="form-group float-label-control">
                        <input type="submit" class="btn btn-primary btn-lg btn-block">
                    </div>
                </form>

            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Features
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Very customizable</li>
                            <li>Works with Bootstrap's native form examples</li>
                            <li>Uses CSS transitions for fallback browser support</li>
                            <li>Placeholder override for labels when fields are empty</li>
                            <li>Included authored jQuery plugin</li>
                            <li>Optional bottom label positioning with the <code>.label-bottom</code> utility</li>
                            <li>Works great with Chrome's AutoComplete</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
session_destroy();
include 'footer.php';
?>