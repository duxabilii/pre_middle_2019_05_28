<?php

namespace Traits;

trait ExportTrait
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
        $this->dir = $dir;
        $reflect = new \ReflectionClass($this);
        $this->filename = $this->dir .
            DIRECTORY_SEPARATOR .
            time().
            '.' .
            $reflect->getShortName();

        try {
            if (!$this->checkDir($this->dir)) {
                $this->createDir($this->dir);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
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
        $db = \Db::getInstance();
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
        if (!mkdir($dir, true)) {
            throw new \Exception('Unable to create directory: ' . $dir);
        }
        return true;
    }
}