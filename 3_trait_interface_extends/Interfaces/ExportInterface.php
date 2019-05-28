<?php

namespace Interfaces;

interface ExportInterface
{
    /**
     * Export constructor.
     * @param string $dir
     */
    public function __construct(string $dir);

    /**
     * Header template
     * @return string
     */
    public function startExport();

    /**
     * Footer template
     * @return string
     */
    public function finishExport();

    /**
     * Export data
     *
     * @return bool
     */
    public function export();

    /**
     * Get Data for Export
     *
     * @return mixed
     */
    public function getData();

    /**
     * Check output directory
     *
     * @param string $dir
     * @return bool
     */
    public function checkDir(string $dir);
}