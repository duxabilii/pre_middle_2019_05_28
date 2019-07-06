<?php

require 'autoload.php';

// Export Into CSV
try {
    $csv = new \Export\Csv(__DIR__ . '/Export/CSV');
    $csv->export();
    echo 'CSV Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

// Export Into HTML
try {
    $csv = new \Export\Html(__DIR__ . '/Export/HTML');
    $csv->export();
    echo 'HTML Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

// Export Into XML
try {
    $csv = new \Export\Xml(__DIR__ . '/Export/XML');
    $csv->export();
    echo 'XML Export completed <br/>';
} catch (Exception $e) {
    die($e->getMessage());
}

