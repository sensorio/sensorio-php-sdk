<?php

namespace Sensorio;

class SensorioUser extends SensorioResource
{
    public function trackEvent(array $options)
    {
        $this->client->post("users", $options);
    }
}