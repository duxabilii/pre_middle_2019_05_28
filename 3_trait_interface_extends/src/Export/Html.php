<?php

namespace Export;

use Interfaces\ExportInterface;
use Traits\ExportTrait;

class Html implements ExportInterface
{
    use ExportTrait;

    /**
     * Export data
     *
     * @return bool
     */
    public function export()
    {
        $data = $this->getData();
        $filename = pathinfo($this->filename, PATHINFO_FILENAME);

        foreach ($data['body'] as $row) {
            $string = "<html><body>ID: {$row['id']}<br/>TITLE: {$row['title']}</body></html>";
            $exportFile = str_replace($filename, $filename . '_' . $row['id'],
                $this->filename);
            file_put_contents($exportFile, $string);
        }
        @unlink($this->filename);
        return true;
    }

    /**
     * @return string
     */
    public function startExport()
    {
        return '';
    }

    /**
     * @return string
     */
    public function finishExport()
    {
        return '';
    }
}