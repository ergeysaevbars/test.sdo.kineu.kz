<?php

function convertImageFromTestToBase64($img_string){
    $img = $img_string;

    try {
        $bmp = imagecreatefrombmp($img);
        ob_start();
        imagejpeg($bmp);
        $img = ob_get_clean();
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $img, FILEINFO_MIME_TYPE);

        return 'data:' . $mime_type . ';base64,' . base64_encode($img);
    } catch (Exception $e) {
        return false;
    }
}