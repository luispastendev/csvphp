<?php

namespace CsvPhp\Exceptions;

class ErrorMessages
{
    private static function catalog(): array
    {
        return [
            [
                'code' => 0,
                'message' => 'error'
            ],
            [
                'code' => 1,
                'message' => 'not is a valid directory.'
            ]
        ];
    }

    public static function message(int $code)
    {
        $messages = array_column(self::catalog(), null, 'code');

        return $messages[$code]['message'] ?? $messages[0]['message'];
    }
}
