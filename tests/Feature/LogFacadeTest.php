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

    // LOG FACADE
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error from Laravel to Slack!");
        Log::critical("Slack should receive this!");

        // dikirim ke stack

        self::assertTrue(true);
    }

    // CONTEXT
    public function testContext()
    {
        Log::info("hello info", [ 'user' => 'rio']);
                                // context


        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(['user' => 'mbud']);
          // mengirim context yang sama
        Log::info("hello info");
        Log::warning("hello warning");

        self::assertTrue(true);
    }

    // SELECTED CHANNEL
    public function testSelectedChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error("Hello slack"); // mengirim ke slack channel

        Log::info("Hello Laravel"); //mengirim ke default channel;

        self::assertTrue(true);
    }

    // HANDLER
    public function testFileHandler()
    {
        $filelogger = Log::channel('file');
        $filelogger->info('hello world');
        $filelogger->warning('hello world');
        $filelogger->error('hello world');

        self::assertTrue(true);
    }
}
