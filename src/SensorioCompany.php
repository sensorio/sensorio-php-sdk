<?php

namespace Sensorio;

class SensorioCompany extends SensorioResource
{
    public function trackEvent(array $options)
    {
        $this->client->post("companies/events", $options);
    }
}