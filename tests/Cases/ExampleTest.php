<?php

declare(strict_types=1);


namespace tests\Cases;

use Hyperf\Testing\TestCase;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $this->get('/')->assertOk()->assertSee('Hyperf');
    }
}
