<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::critical("Hello Criticak");
        Log::error("Hello Error");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "Khoirunnisa"]);
        Log::info("Hello Info", ["user" => "Khoirunnisa"]);
        Log::info("Hello Info", ["user" => "Khoirunnisa"]);


        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "Khoirunnisa"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");


        self::assertTrue(true);
    }

    public function testChannel()
    {
        $slackLogger = Log::channel("slack");
        $slackLogger->error("Hello Slack"); //mengirim ke slack channel

        Log::info("Hello Laravel"); //mengirim ke default channel
        self::assertTrue(true);
    }

    public function testFileHandler()
    {
        $fileLogger = Log::channel("file");
        $fileLogger->info("Hello File Handler");
        $fileLogger->warning("Hello File Handler");
        $fileLogger->error("Hello File Handler");
        $fileLogger->critical("Hello File Handler");

        self::assertTrue(true);
    }
}
