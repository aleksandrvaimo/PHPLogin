<?php

namespace AppTest\Test;

use App\Test\Block\Page;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    const PAGE_NAME = 'Counter web application';

    public function testGetName(): void
    {
        $page = new Page;
        $this->assertEquals($page->getName(), self::PAGE_NAME);
    }
}
