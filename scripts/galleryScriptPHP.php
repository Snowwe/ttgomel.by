<?php
function get_files($dir)
{
    $files = scandir($dir);
    unset($files[0], $files[1], $files[2]);
    return $files;
}

function get_img_info($f)
{
    $img_info = file($f);
    return $img_info;
}

?>


