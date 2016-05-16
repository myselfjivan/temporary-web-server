<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $name = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $size = $_FILES['file']['size'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    switch ($error) {
        case UPLOAD_ERR_OK:
            $valid = true;
            if (!in_array($ext, array('sql'))) {
                $valid = false;
                $response = 'Invalid file extension.';
            }
            if ($size / 1024 / 1024 > 2) {
                $valid = false;
                $response = 'File size is exceeding maximum allowed size.';
            }
            if ($valid) {
                $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . $name;
                move_uploaded_file($tmpName, $targetPath);
                $_SESSION["sqlfile"] = $name;
                header('Location: database.php');
                exit;
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
            break;
    }

    echo $response;
}
?>