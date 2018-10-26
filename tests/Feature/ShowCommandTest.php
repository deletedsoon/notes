<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowCommandTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testShowCommand()
    {
        $this->artisan('show')
            ->expectsOutput('Notes successfully loaded from database.')
            ->assertExitCode(0);
    }
}
