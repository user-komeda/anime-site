<?php

declare(strict_types=1);

namespace App\Config\Settings;

class Settings implements SettingsInterface
{
    /**
     * @var array<string, array<string, array<int|string, string>|bool|int|string>|true>
     */
    private array $settings;

    /**
     * @param array<string, array<string, array<int|string, string>|bool|int|string>|true> $settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function get(string $key = '')
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }
}
