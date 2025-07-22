<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use illuminate\Support\Facades\Log;
use Tests\TestCase;

class LogFacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error from Laravel to Slack!");
        Log::critical("Slack should receive this!");

        // dikirim ke stack

        self::assertTrue(true);
    }
}
