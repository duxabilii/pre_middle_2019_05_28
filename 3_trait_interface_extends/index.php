<?php

use Classes\Export\Csv;

require 'vendor/autoload.php';

// Export Into CSV
try {
    $csv = new Csv('CSV');
    $csv->export();
    echo 'CSV Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

// Export Into HTML
try {
    $csv = new \Classes\Export\Html('HTML');
    $csv->export();
    echo 'HTML Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

// Export Into XML
try {
    $csv = new \Classes\Export\Xml('XML');
    $csv->export();
    echo 'XML Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

