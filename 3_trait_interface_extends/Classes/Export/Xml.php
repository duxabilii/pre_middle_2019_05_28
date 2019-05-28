<?php

namespace Classes\Export;

use Interfaces\ExportInterface;
use Traits\HelperTrait;

class Xml implements ExportInterface
{
    use HelperTrait;

    /**
     * Export data
     *
     * @return bool
     */
    public function export()
    {
        $data = $this->getData();

        fputs($this->exportFile, $data['header']);
        foreach ($data['body'] as $row) {
            $string = "<product><id>{$row['id']}</id><title>{$row['title']}</title></product>" . PHP_EOL;
            fputs($this->exportFile, $string);
        }
        fputs($this->exportFile, $data['footer']);

        return true;
    }

    /**
     * @return string
     */
    public function startExport()
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><products>' . PHP_EOL;
    }

    /**
     * @return string
     */
    public function finishExport()
    {
        return '</products>';
    }
}