<?php

use CsvPhp\Core\FilesCollection;
use CsvPhp\Entity\File;

beforeEach(function () {
    $this->collection = new FilesCollection;
});

it('add files to collection.', function () {

    $file_1 = mock(File::class)->expect();
    $file_2 = mock(File::class)->expect();

    $this->collection->add($file_1);
    $this->collection->add($file_2);

    $storage = getPrivateProperty($this->collection, 'storage');
    expect($storage)->toHaveCount(2);

});

