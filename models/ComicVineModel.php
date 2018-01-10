<?php

namespace models;


use extensions\core\RestModel;
use extensions\exceptions\ComicVineException;
use nadir2\core\AppHelper;

/**
 * Class ComicVine
 * @package models
 */
class ComicVine extends RestModel {
    /**
     * @var array|null ComicVine config
     */
    private $_config = NULL;

    /**
     * @var array Resources at ComicVine for building correct API links
     */
    private $_resources = array(
        'issue'     => '4000-',
        'volume'    => '4050-',
        'publisher' => '',
    );

    /**
     * The constructor
     */
    public function __construct() {
        $this->_config = AppHelper::getInstance()->getConfig('comicvine');
    }

    /**
     * Execute the request
     * @param string $url Request URL
     * @return array
     * @throws ComicVineException
     */
    private function _executeRequest(string $url): array {
        $aResult = json_decode(parent::executeRequest($url), TRUE);
        if ($aResult['status_code'] == 1) {
            return $aResult;
        }
        throw new ComicVineException('ComicVine error: ' . $aResult['error'] . ', ' . $url, $aResult['status_code']);
    }

    /**
     * Build ComicVine API URL
     * @param string $resource Resource type
     * @param array  $params   URL parameters
     * @return string
     */
    private function _createUrl(string $resource, array $params): string {
        /** @var string $sResourceId Resource ID for ComicVine */
        $sResourceId = '';
        if (isset($this->_resources[$resource])) {
            $sResourceId = $this->_resources[$resource] . $params['resource_id'] . '/';
        }

        /** @var string $sParams Parameters: fields, filters, ordering */
        $sParams = '';
        if (isset($params['settings'])) {
            foreach ($params['settings'] as $key => $setting) {
                if (is_array($params['settings'][$key])) {
                    $sParams .= '&' . $key . '=' . implode(',', $params['settings'][$key]);
                } else {
                    $sParams .= '&' . $key . '=' . $params['settings'][$key];
                }
            }
        }

        return $this->_config['api_url'] . '/' . $resource . '/' . $sResourceId
            . '?api_key=' . $this->_config['api_key'] . '&format=json' . $sParams;
    }
}