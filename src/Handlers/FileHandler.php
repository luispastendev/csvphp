<?php

declare(strict_types=1);

namespace CsvPhp\Handlers;

use CsvPhp\Exceptions\FileHandlerException;

class FileHandler
{
    /**
     * create a new file.
     *
     * @param string $path
     * @return void
     */
    public static function create(string $path): void
    {
        if (! fopen($path, 'a')) {
            throw new \Exception('Error al crear el archivo.');
        }
    }

    /**
     * Write to file.
     *
     * @param $path
     * @param $rows
     */
    public static function write(string $path, array $rows = []): void
    {
        if (($file = fopen($path, 'a')) === false) {
            throw new FileHandlerException("can't open file: {$path}.");
        }

        foreach ($rows as $row) {
            if (! fputcsv($file, $row)) {
                throw new FileHandlerException("can't write in file: {$path}.");
            }
        }

        if (! fclose($file)) {
            throw new FileHandlerException("can't close file: {$path}.");
        }
    }

    /**
     * Destroy a file
     *
     * @param $path
     */
    public static function destroy(string $path): bool
    {
        if (! file_exists($path)) {
            return false;
        }

        return unlink($path);
    }

    /**
     * Read file content
     *
     * @param $path
     * @param $delimiter
     *
     * @return array<array<string>>
     */
    public static function read(string $path, string $delimiter = ','): array
    {
        if (($file = fopen($path, 'r')) === false) {
            throw new FileHandlerException("can't open file: {$path}.");
        }

        $rows = [];
        while (($row = fgetcsv($file, null, $delimiter)) !== false) {
            $rows[] = $row;
        }

        return $rows;
    }
}
