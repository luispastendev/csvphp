<?php

use CsvPhp\Core\Generator;
use CsvPhp\Exceptions\CsvException;
use CsvPhp\Exceptions\ErrorMessages;

beforeEach(function () {
    $this->generator = new Generator;
});

it('set output directory throws error.', function () {
    $this->generator->output('/path/notexist');
})->throws(CsvException::class, ErrorMessages::message(1))
->only();

it('set valid output directory.', function () {
    $this->generator->output(__DIR__);
    $outputDir = getPrivateProperty($this->generator, 'output');

    expect($outputDir)->toBe(__DIR__);
})
->only();

