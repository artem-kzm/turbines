<?php

namespace App\Services;

class Config
{
    private static array $configs = [];

    public static function setConfig(string $configName, array $config): void
    {
        static::$configs[$configName] = $config;
    }

    /**
     * Gets the config value using config path connected by dot.
     * i.e. config_name.config_key
     */
    public static function get(string $config): string
    {
        [$configName, $configKey] = explode('.', $config);

        return static::$configs[$configName][$configKey];
    }
}
