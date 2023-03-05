<?php

namespace CsvPhp\Libs;


class Validator
{

    public function validate()
    {
        // $path = empty($path) ? $this->pathFile : $path;

        // $valid = ! (empty($path) || ! preg_match('/\.csv$/', $path));

        // if (! $valid) {
        //     $this->errorMessage = 'Debe proporcionar un archivo existente o inexistente con extensión .csv';
        // }

        // return $valid;
    }

    public function isValidDir(string $dir): bool
    {
        return is_dir($dir) && is_readable($dir);
    }

    private function isValidFile(string $path): bool
    {
        return is_readable($path) && is_writable($path);
    }

    private function isCSVFile(string $path): bool
    {
        return (bool) preg_match('/.*\.csv$/i', $path);
    }
}
