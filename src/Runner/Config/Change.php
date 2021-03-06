<?php

namespace CaptainHook\App\Runner\Config;

use CaptainHook\App\Config;

interface Change
{
    /**
     * Apply changes to the given config
     *
     * @param \CaptainHook\App\Config $config
     */
    public function applyTo(Config $config);
}
