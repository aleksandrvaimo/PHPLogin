<?php
namespace AppTest\Test;

use App\Test\Model\ParseTags;
use PHPUnit\Framework\TestCase;

class ParseTagsTest extends TestCase
{
    const PARAM_STRING = '[TAG_NAME:description]data[/TAG_NAME]';

    const RESULT_ARRAY = [
        'TAG_NAME' => [
            'description' => 1,
            'data' => 2
        ]
    ];
    public function testGetParsedTags(): void
    {
        $parsedTags = new ParseTags;
        $this->assertEquals($parsedTags->getParsedTags(self::PARAM_STRING), self::RESULT_ARRAY);
    }
}
