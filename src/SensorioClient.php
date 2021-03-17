<?php

namespace Sensorio;

use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use Psr\Http\Message\ResponseInterface;

class SensorioClient
{
    const SDK_VERSION = '1.0.0';

    /**
     * @var HttpClient $httpClient
     */
    private $httpClient;

    /**
     * @var RequestFactory $requestFactory
     */
    private $requestFactory;

    /**
     * @var $company SensorioCompany
     */
    private $company;

    /**
     * @var $user SensorioUser
     */
    private $user;

    /**
     * @var $appKey string
     */
    private $appKey;

    public function __construct(string $appKey)
    {
        $this->company = new SensorioCompany($this);
        $this->user = new SensorioUser($this);

        $this->appKey = $appKey;

        $this->httpClient = $this->getDefaultHttpClient();
        $this->requestFactory = MessageFactoryDiscovery::find();
    }



    public function post($endpoint, $json)
    {
        $response = $this->sendRequest('POST', "https://www.sensorio.io/api/$endpoint", $json);
        return $this->handleResponse($response);
    }

    /**
     * @return HttpClient
     */
    private function getDefaultHttpClient()
    {
        return new PluginClient(
            HttpClientDiscovery::find(),
            [new ErrorPlugin()]
        );
    }

    private function sendRequest($method, $uri, $body = null)
    {
        $body = is_array($body) ? json_encode($body) : $body;
        $headers = [];
        $request = $this->requestFactory->createRequest($method, $uri, $headers, $body);

        return $this->httpClient->sendRequest($request);
    }

    private function handleResponse(ResponseInterface $response)
    {
        $stream = $response->getBody()->getContents();

        return json_decode($stream);
    }

}