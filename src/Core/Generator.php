<?php

namespace CsvPhp\Core;

use CsvPhp\Core\File;
use CsvPhp\Core\CsvFile;
use CsvPhp\Exceptions\CsvException;
use CsvPhp\Libs\Validator;
use CsvPhp\Exceptions\ErrorMessages;

/**
 * CSVGenerator
 *
 * Clase principal para generación de archivos.
 */
final class Generator
{
    /**
     * Output directory path
     *
     * @var string
     */
    protected $output;

    protected $validator;

    /*
     * Constructor
     *
     * @param string $dir
     */
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function output(string $dir): self
    {
        if (! $this->validator->isValidDir($dir)) {
            throw new CsvException(ErrorMessages::message(1));
        }

        $this->output = $dir;

        return $this;
    }

    // /**
    //  * Establece un archivo para trabajar sobre el.
    //  *
    //  * @param string $path
    //  * @return self
    //  */
    // public function setFile(string $path): self
    // {
    //     $this->pathFile = $path;

    //     return $this;
    // }

    // /**
    //  * Regresa información del archivo nuevo o existente.
    //  *
    //  * @return array
    //  */
    // public function getFileInfo(): array
    // {
    //     return $this->getCsvInfo($this->pathFile);
    // }

    // /**
    //  * Se encarga de crear un archivo y agregar datos.
    //  *
    //  * @param string $path
    //  * @param array $rows
    //  * @return self
    //  */
    // public function create(string $path, array $rows = []): self
    // {
    //     if ($this->validateFile($path)) {
    //         $this->createFile($path);
    //     }

    //     $this->add($rows);

    //     return $this;
    // }

    // /**
    //  * Se encarga de agregar data a un archivo existente.
    //  *
    //  * @param array $rows
    //  * @return bool
    //  */
    // public function add(array $rows): bool
    // {
    //     if (empty($rows)) {
    //         return true;
    //     }

    //     if (! $this->validateFile()) {
    //         return false;
    //     }

    //     if (! $file = fopen($this->pathFile, 'a')) {
    //         $this->errorMessage = "El archivo {$this->pathFile} no existe.";

    //         return false;
    //     }

    //     if (empty(array_filter($rows, 'is_array'))) { // is unidimensional?
    //         $rows = [$rows];
    //     }

    //     foreach ($rows as $row) {
    //         if (! fputcsv($file, $row)) {
    //             $this->errorMessage = "Error al escribir en el fichero: {$this->pathFile}.";

    //             return false;
    //         }
    //     }

    //     if (! fclose($file)) {
    //         $this->errorMessage = "Error al cerrar el fichero: {$this->pathFile}.";

    //         return false;
    //     }

    //     return true;
    // }

    // /**
    //  * Regresa un posible mensaje de error.
    //  *
    //  * @return string
    //  */
    // public function getError(): string
    // {
    //     return $this->errorMessage;
    // }
}




