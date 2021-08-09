<?php

declare(strict_types=1);

namespace Asseco\Attachments\Tests;

use Asseco\Common\CommonServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [CommonServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
