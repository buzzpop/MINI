<?php
function recup_avatar(){
    if (isset($_FILES['file'])) {
        $name_file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $local_image = "../Images/";
        move_uploaded_file($tmp_name, $local_image.$name_file);
        return $local_image.$name_file;
    }
}