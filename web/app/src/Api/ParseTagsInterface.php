<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api;
interface ParseTagsInterface
{
    const PATTERN = '/[:[\/\]]/';

    public function getParsedTags(string $text = ''): ?array;
}
