<?php

require('vendor/autoload.php');

use Classes\Image;

// Try to create cache class or exit with error
try {
    $image = new Image('image.jpg');
    $filename = $image->resize(100, 200);
    echo $filename;

} catch (Exception $e) {
    exit($e->getMessage());
}