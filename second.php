<?php
$target_dir = "/var/www/html/temporaryWebServer/uploads/" . $_POST["path"] . "/";
mkdir($target_dir, 0777, true);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_FILES["myfile"])) {
    $ret = array();

    $error = $_FILES["myfile"]["error"]; {

        if (!is_array($_FILES["myfile"]['name'])) { //single file
            $RandomNum = time();

            $ImageName = str_replace(' ', '-', strtolower($_FILES['myfile']['name']));
            $ImageType = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.

            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.', '', $ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;

            move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $NewImageName);
            //echo "<br> Error: ".$_FILES["myfile"]["error"];

            $ret[$fileName] = $output_dir . $NewImageName;
        } else {
            $fileCount = count($_FILES["myfile"]['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $RandomNum = time();

                $ImageName = str_replace(' ', '-', strtolower($_FILES['myfile']['name'][$i]));
                $ImageType = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.

                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt = str_replace('.', '', $ImageExt);
                $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;

                $ret[$NewImageName] = $output_dir . $NewImageName;
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $output_dir . $NewImageName);
            }
        }
    }
    echo json_encode($ret);
}
?>
<!DOCTYPE html>
<html>
    <body>

        <form action="" method="post" enctype="multipart/form-data">
            <label>Root Directory Name</label>
            <input type="text" name="path" value="" required>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
        </form>

    </body>
</html>