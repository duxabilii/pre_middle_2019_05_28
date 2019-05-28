<?php

namespace Traits;

use Classes\Db;

trait HelperTrait
{
    private $dir;

    private $filename;

    private $exportFile;

    /**
     * Export constructor.
     * @param string $dir
     */
    public function __construct(string $dir)
    {
        $this->dir = 'Export/' . $dir;
        $this->filename = $this->dir . DIRECTORY_SEPARATOR . time() . '.' . strtolower($dir);

        if (
            !$this->checkDir($this->dir)
            AND
            !$this->createDir($this->dir)
            AND
            !$this->exportFile
        ) {
            throw new \Exception('Unable to create directory for export');
        }
        $this->exportFile = fopen($this->filename, 'w');
    }

    public function __destruct()
    {
        fclose($this->exportFile);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        $db = Db::getInstance();
        $data = $db->query('SELECT * FROM `03_products`');
        if (!$data) {
            throw new \Exception('Empty dataset');
        }
        return [
            'header' => $this->startExport(),
            'body' => $data,
            'footer' => $this->finishExport()
        ];
    }

    /**
     * @param string $dir
     * @return bool
     */
    public function checkDir(string $dir)
    {
        return is_dir($dir);
    }

    /**
     * @param string $dir
     * @return bool
     */
    public function createDir(string $dir)
    {
        return mkdir($dir);
    }
}