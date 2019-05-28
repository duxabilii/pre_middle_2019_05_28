<?php

namespace Classes\Export;

use Interfaces\ExportInterface;
use Traits\HelperTrait;

class Csv implements ExportInterface
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

        fputcsv($this->exportFile, $data['header']);
        foreach ($data['body'] as $row) {
            fputcsv($this->exportFile, [$row['id'], $row['title']]);
        }
        fputs($this->exportFile, $data['footer']);

        return true;
    }

    /**
     * @return string
     */
    public function startExport()
    {
        return ['Product ID', 'Product Title'];
    }

    /**
     * @return string
     */
    public function finishExport()
    {
        return '';
    }
}