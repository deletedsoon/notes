<?php

namespace Tests\Feature;

use Tests\TestCase;

class AddCommandTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testAddCommand()
    {
        $this->artisan('add')
            ->expectsQuestion('What is the title?', 'Enim neque')
            ->expectsQuestion('What is the description?', 'Lectus sit amet est placerat.')
            ->expectsOutput('Note saved to database.')
            ->assertExitCode(0);
    }
}
