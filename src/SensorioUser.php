<?php

namespace Sensorio;

class SensorioUser extends SensorioResource
{
    public function trackEvent(array $options)
    {
        return $this->client->post("users/events", $options);
    }
}