<?php

namespace Export;

use Interfaces\ExportInterface;
use Traits\ExportTrait;

class Csv implements ExportInterface
{
    use ExportTrait;

    /**
     * Export data
     *
     * @return bool
     * @throws \Exception
     */
    public function export()
    {
        try {
            $data = $this->getData();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        fputcsv($this->exportFile, $data['header']);
        foreach ($data['body'] as $row) {
            fputcsv($this->exportFile, [$row['id'], $row['title']]);
        }
        fputs($this->exportFile, $data['footer']);

        return true;
    }

    /**
     * @return array
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