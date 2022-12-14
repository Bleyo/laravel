<?php

namespace App\src\Services;

use Illuminate\Support\Facades\Config;
use Faker\Container\ContainerInterface;

class Configuration
{
    protected self $reference;

    protected array $data;


    public function __construct($accessPoint)
    {
        $this->data = Config::get($accessPoint);
    }

    public function getProperty(string $prop)
    {
        return $this->data['prop'];
    }
}
