<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\Unit\FileHandler::class)->in('Feature');
// uses()->group();

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

// expect()->extend('toBeOne', function () {
//     return $this->toBe(1);
// });

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

define('FILES_PATH', __DIR__ . '/_support');

function cleanDummyFiles($files = '') {
    if (empty($files)) return;

    if (is_string($files)) {
        $files = [$files];
    }

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

function createDummyFile(string $path, array $rows = []) {

    $rows = empty($rows) ? getDummyData() : $rows;

    if (empty(array_filter($rows, 'is_array'))) { // is unidimensional?
        $rows = [$rows];
    }

    $file = fopen($path, 'a');

    foreach ($rows as $row) {
        fputcsv($file, $row);
    }

    fclose($file);
}

function getPrivateMethod(object $obj, $method) {
    $refMethod = new ReflectionMethod($obj, $method);
    $refMethod->setAccessible(true);
    $obj = (gettype($obj) === 'object') ? $obj : null;

    return function (...$args) use ($refMethod, $obj) {
        return $refMethod->invokeArgs($obj, $args);
    };
}

/**
 * Retrieve a private property.
 *
 * @param string        $property property name
 *
 * @return mixed value
 *
 * @throws ReflectionException
 */
function getPrivateProperty($obj, $property)
{
    $refClass = new ReflectionObject($obj);

    $refProperty = $refClass->getProperty($property);
    $refProperty->setAccessible(true);

    return $refProperty->getValue($obj);
}

function getDummyData() {
    return [
        ['id','user','col'],
        [1,'user1','foo'],
        [2,'user2','bar'],
        [3,'user3','baz']
    ];
}

function getFileContent(string $path) {

    $file = fopen($path, 'r');
    $data = [];

    while (($row = fgetcsv($file)) !== FALSE) {
        $data[] = $row;
    }

    return $data;
}



