<?php

require('vendor/autoload.php');

use Classes\Image;

// Try to create cache class or exit with error
try {
    $image = new Image('image.jpg');
    $image = $image->resize(100, 200);
    header('Content-type: image/png');
    echo $image;

} catch (Exception $e) {
    exit($e->getMessage());
}