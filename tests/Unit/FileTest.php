<?php

use CsvPhp\Entity\File;

it('getfile name', function () {
    $path = __DIR__ . '/dummy.csv';
    createDummyFile($path);
    $file = new File($path);

    var_dump($file->getBaseName());

    // expect()->
});
