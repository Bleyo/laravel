<?php

namespace App\src\Services;

use Illuminate\Support\Facades\Config;
use Faker\Container\ContainerInterface;

class Map
{
    private Configuration $instance;

    public function __construct(Configuration $instance)
    {
        $this->instance = $instance;
    }

    public function registerMap(Map $mapped, $key)
    {
        $this->instance->addMap(['key' => $mapped]);
        return $this->instance;
    }
}
