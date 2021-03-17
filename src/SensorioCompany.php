<?php

namespace Sensorio;

class SensorioCompany extends SensorioResource
{
    public function trackEvent(array $options)
    {
        return $this->client->post("companies/events", $options);
    }
}