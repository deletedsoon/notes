<?php

namespace Tests\Feature;

use Tests\TestCase;

class CleanCommandTest extends TestCase
{
    /**
     * Test clean command.
     */
    public function testCleanCommand()
    {
        $this->artisan('clean')
            ->expectsOutput('All notes deleted from database.')
            ->assertExitCode(0);
    }
}
