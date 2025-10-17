<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Config\Config;

class ConfigTest extends TestCase
{
    public function testConfigSingleton(): void
    {
        $config1 = Config::getInstance();
        $config2 = Config::getInstance();
        
        $this->assertSame($config1, $config2);
    }

    public function testConfigGet(): void
    {
        $config = Config::getInstance();
        
        $value = $config->get('NONEXISTENT_KEY', 'default_value');
        
        $this->assertEquals('default_value', $value);
    }
}
