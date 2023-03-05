<?php

use CsvPhp\Exceptions\ErrorMessages;

it('get code errors', function () {
    $errors  = new ErrorMessages;
    $catalog = getPrivateMethod($errors, 'catalog');
    $code    = 0;
    $message = $catalog()[$code]['message'];

    expect($errors::message($code))->toBe($message);
    // not exist error return default error
    expect($errors::message(11111))->toBe($message);
});


