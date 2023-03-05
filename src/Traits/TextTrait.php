<?php

namespace CsvPhp\Traits;

/**
 * Text utilities
 */
trait TextTrait
{
    /**
     * Add incremental suffix
     *
     * @param string $name
     *
     * @return string
     */
    public function addSuffix(string $name): string
    {
        $match = preg_match('/_\d+$/', $name, $matches);

        if ($match === false) {
            throw new \Exception('filename not valid.');
        }

        if ($match === 0) {
            $name = "{$name}_1";
        }

        if ($match === 1) {
            $suffix = (int) str_replace('_', '', $matches[0]);
            $suffix += 1;
            $name = preg_replace('/_\d+$/', "_{$suffix}", $name);
        }

        return $name;
    }
}
