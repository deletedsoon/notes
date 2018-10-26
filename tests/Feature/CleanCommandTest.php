<?php

namespace Tests\Feature;

use Tests\TestCase;

class CleanCommandTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testCleanCommand()
    {
        $this->artisan('clean')
            ->expectsOutput('All notes deleted from database.')
            ->assertExitCode(0);
    }
}
