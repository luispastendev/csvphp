<?php

use CsvPhp\Traits\TextTrait;

uses(TextTrait::class);

it('add suffix to text', function () {
    expect($this->addSuffix('dummy'))->toBe('dummy_1');
    expect($this->addSuffix('dummy_'))->toBe('dummy__1');
    expect($this->addSuffix('dummy__1'))->toBe('dummy__2');
    expect($this->addSuffix('dummy_199'))->toBe('dummy_200');
});

