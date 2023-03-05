<?php

use CsvPhp\Libs\Validator;

it('validate if is a valid file', function () {
    $file = FILES_PATH . '/dummy.csv';
    createDummyFile($file);

    $isValidFile = getPrivateMethod((new Validator), 'isValidFile');
    expect($isValidFile($file))->toBeTrue();

    cleanDummyFiles($file);
});

it('validate if is a valid csv file', function () {
    $isCSVFile = getPrivateMethod((new Validator), 'isCSVFile');

    expect($isCSVFile('/path/dummy.csv'))->toBeTrue();
    expect($isCSVFile('/path/dummy.pdf'))->toBeFalse();
    expect($isCSVFile('/path/dummy.CSV'))->toBeTrue();
});

it('validate if is a valid dir', function () {
    $path = FILES_PATH . '/notfound';
    expect((new Validator)->isValidDir($path))->toBeFalse();
});


