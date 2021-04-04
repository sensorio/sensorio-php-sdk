<?php

namespace Sensorio;

class SensorioCompany extends SensorioResource
{
    public function trackEvent(array $options)
    {
        return $this->client->post("companies/events", $options);
    }

    public function update(array $options)
    {
        return $this->client->post("companies/update", $options);
    }

    public function delete()
    {
        return $this->client->post("companies/delete", []);
    }
}