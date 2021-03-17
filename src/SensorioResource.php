<?php

namespace Sensorio;

abstract class SensorioResource
{
    /**
     * @var SensorioClient
     */
    protected $client;

    /**
     * @param SensorioClient $client
     */
    public function __construct(SensorioClient $client)
    {
        $this->client = $client;
    }
}