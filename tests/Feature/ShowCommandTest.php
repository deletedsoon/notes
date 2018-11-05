<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowCommandTest extends TestCase
{
    /**
     * Test show command.
     */
    public function testShowCommand()
    {
        $this->artisan('show')
            ->expectsOutput('Notes successfully loaded from database.')
            ->assertExitCode(0);
    }
}
