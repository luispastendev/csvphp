<?php

declare(strict_types=1);

namespace CsvPhp\Core;

use CsvPhp\Entity\File;
use SplObjectStorage;

final class FilesCollection
{
    public $storage = '';

    public function __construct()
    {
        $this->storage = new SplObjectStorage();
    }

    public function add(File $file)
    {
        $this->storage->attach($file);
    }
}
