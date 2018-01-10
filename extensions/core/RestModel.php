<?php

namespace extensions\core;


use GuzzleHttp\Client;

/**
 * Class RestModel
 * @package extensions\core
 */
class RestModel extends AbstractModel {
    /**
     * Execute the request
     * @param string $url Request URL
     * @return array|string Response
     */
    protected function executeRequest(string $url): string {
        $oGuzzleClient = new Client();
        $oResponse = $oGuzzleClient->get($url);
        return $oResponse->getBody();
    }
}