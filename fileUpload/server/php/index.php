<?php

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

class CustomUploadHandler extends UploadHandler {

    protected function get_user_id() {
        @session_start();
        return session_id();
    }

}

$upload_handler = new CustomUploadHandler(array(
    'user_dirs' => true
        ));
