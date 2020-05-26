<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function testExtractPath_With_DomainName()
    {
        $path = extractPath('http://localhost');

        $this->assertEquals('/', $path);
    }

    public function testExtractPath_With_StringOnly()
    {
        $path = extractPath('localhost/posts/news');

        $this->assertEquals('posts/news', $path);
    }
}
