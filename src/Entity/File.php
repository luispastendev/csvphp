<?php

namespace CsvPhp\Entity;

use SplFileInfo;

/**
 * File
 *
 * Clase para trabajar con archivos.
 */
class File extends SplFileInfo
{
    public function __construct(string $path)
    {
        parent::__construct($path);
    }
}
