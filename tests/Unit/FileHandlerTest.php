<?php

use CsvPhp\Handlers\FileHandler;

beforeEach(function () {
    $this->path = '';
});

afterEach(function () {
    cleanDummyFiles($this->path);
});

it('create file', function () {
    $this->path = FILES_PATH . '/dummy.csv';

    FileHandler::create($this->path);

    expect($this->path)->toBeFile();
});

it('write file', function () {
    $this->path = FILES_PATH . '/dummy.csv';
    $columns    = ['name' , 'age'];
    $body       = ['machy', 18];

    createDummyFile($this->path, $columns);
    FileHandler::write($this->path, [$body]);
    $content = getFileContent($this->path);

    expect($content)->toMatchArray([$columns, $body]);
});

it('destroy file', function () {
    $this->path = FILES_PATH . '/dummy.csv';
    createDummyFile($this->path);

    expect(FileHandler::destroy($this->path))->toBeTrue();
});

it('read file', function () {
    $this->path = FILES_PATH . '/dummy.csv';
    $data = [
        ['foo', 'bar'],
        ['baz', 'boo']
    ];
    createDummyFile($this->path, $data);

    expect(FileHandler::read($this->path))->toMatchArray($data);
});
