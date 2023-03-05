<?php

namespace CsvPhp\Core;

use CsvPhp\Entity\File;
use CsvPhp\Handlers\FileHandler;

class CsvFile extends Validator
{
    protected $validator;

    public function __construct()
    {

    }

    /**
     * Pathfile del archivo
     *
     * @var string
     */
    protected $pathFile = '';

    /**
     * Mensaje de error
     *
     * @var string
     */
    protected $errorMessage = '';

    protected $name = '';

    /**
     * Set filename
     *
     * @param string $name
     * @return self
     */ 
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Create a new file.
     *
     * @param string $path
     * @return bool
     */
    public function create(): bool
    {
        try {
            if (file_exists($path)) {
                $path = $this->getFilenameWithSuffix($path);
            }

            FileHandler::create($path);
        } catch (\Throwable $th) {
            $this->errorMessage = $th->getMessage();

            return false;
        }

        $this->pathFile = $path;

        return true;
    }

    /**
     * Genera un path de archivo con sufijo incremental.
     *
     * @param string $path
     * @return string
     */
    private function getFilenameWithSuffix(string $path): string
    {
        $info     = new File($path);

        $filename = $this->addSuffix($info['basename']);
        $new_path = "{$info['path']}/{$filename}.{$info['extension']}";

        if (file_exists($new_path)) {
            $new_path = $this->getFilenameWithSuffix($new_path);
        }

        return $new_path;
    }

    /**
     * Genera la información de un archivo existente o nuevo.
     *
     * @param string $path
     * @return array
     */
    public function getCsvInfo(string $path): array
    {
        $file      = new \SplFileInfo($path);
        $basename  = $file->getBasename('.csv');
        $extension = $file->getExtension();

        return [
            'filename'  => "{$basename}.{$extension}",
            'basename'  => $basename,
            'extension' => $extension,
            'path'      => $file->getPath(),
        ];
    }
}

