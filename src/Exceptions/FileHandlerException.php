<?php

namespace CsvPhp\Exceptions;

use Exception;

class FileHandlerException extends Exception
{
    public function __construct(string $message = '')
    {
        parent::__construct($message);
    }
}
