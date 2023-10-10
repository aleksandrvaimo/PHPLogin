<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model;

use App\Test\Api\ParseTagsInterface;
use function array_flip;
use function preg_split;

class ParseTags implements ParseTagsInterface
{
    public function getParsedTags(string $text = ''): ?array
    {
        if (empty($text)) {
            return null;
        }

        $array = preg_split(self::PATTERN, trim($text), -1, PREG_SPLIT_NO_EMPTY);

        return $this->getPreparedArray($array);
    }

    private function getPreparedArray(array $array): ?array
    {
        $first = reset($array);
        $last = end($array);

        if (empty($array) || $first != $last) {
            return null;
        }

        return [
            $first => $this->getElementsBetweenFirstAndLastTags($first, $array)
        ];
    }

    private function getElementsBetweenFirstAndLastTags(string $first, array $array): array
    {
        $flippedArray = array_flip($array);
        unset($flippedArray[$first]);

        return $flippedArray;
    }
}
