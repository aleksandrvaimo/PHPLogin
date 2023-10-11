<?php
namespace AppTest\Test;

use App\Test\Model\ParseTags;
use PHPUnit\Framework\TestCase;

class ParseTagsTest extends TestCase
{
    const PARAM_STRING = '[TAG_NAME:description]data[/TAG_NAME]';
    const PARAM_STRING2 = '[TAG_NAMEE:description]data[/TAG_NAME]';
    const PARAM_STRING3 = '[TAG_NAME:description:TAG_NAME]data[/TAG_NAME]';
    const PARAM_STRING4 = '[TAG_NAME:TAG_NAME1:description:TAG_NAME]data:TAG_NAME1[/TAG_NAME]';
    const PARAM_STRING5 = '[TAG_NAME][/TAG_NAME]';

    const RESULT_ARRAY = [
        'TAG_NAME' => [
            'description' => 1,
            'data' => 2
        ]
    ];

    const RESULT_ARRAY1 = [
        'TAG_NAME' => [
            'description' => 1,
            'data' => 3
        ]
    ];

    const RESULT_ARRAY2 = [
        'TAG_NAME' => [
            'TAG_NAME1' => 5,
            'description' => 2,
            'data' => 4
        ]
    ];

    const RESULT_ARRAY3 = ['TAG_NAME'];

    public function testGetParsedTags(): void
    {
        $parsedTags = new ParseTags;
        $this->assertEquals($parsedTags->getParsedTags(self::PARAM_STRING), self::RESULT_ARRAY);
    }

    public function testGetParsedTagsReturnNull(): void
    {
        $parsedTags = new ParseTags;
        $this->assertNull($parsedTags->getParsedTags(self::PARAM_STRING2));
    }

    public function testGetParsedTagsWithMultipleTags(): void
    {
        $parsedTags = new ParseTags;
        $this->assertEquals($parsedTags->getParsedTags(self::PARAM_STRING3), self::RESULT_ARRAY1);
    }

    public function testGetParsedTagsWithMultipleDifferentTags(): void
    {
        $parsedTags = new ParseTags;
        $this->assertEquals($parsedTags->getParsedTags(self::PARAM_STRING4), self::RESULT_ARRAY2);
    }

    public function testGetParsedTagsWithoutChildren(): void
    {
        $parsedTags = new ParseTags;
        $this->assertEquals($parsedTags->getParsedTags(self::PARAM_STRING5), self::RESULT_ARRAY3);
    }
}
