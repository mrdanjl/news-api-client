<?php

namespace News\API\Client;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use News\API\Exception\RuntimeException;

/**
 * NewsAPIClient class.
 * 
 * @extends Client
 */
class NewsAPIClient extends Client
{
    /**
     * Config defaults
     * 
     * @var mixed
     * @access private
     * @static
     */
    private static $configDefaults = array(
        'baseUrl' => 'http://newsaustralia.api.mashery.com/',
        'version' => 'v1'
    );
    
    /**
     * Config required
     * 
     * @var mixed
     * @access private
     * @static
     */
    private static $configRequired = array(
        'baseUrl',
        'version',
        'apiKey'
    );
    
    /**
     * serviceDescriptionFile
     * 
     * (default value: '{version}.php')
     * 
     * @var string
     * @access private
     * @static
     */
    private static $serviceDescriptionFile = '{version}.php';

    /**
     * factory function.
     * 
     * @access public
     * @static
     * @param array $config (default: array())
     * @return \News\API\Client\NewsAPIClient
     */
    public static function factory($config = array())
    {   
        // create configuration
        $config = Collection::fromConfig($config, self::$configDefaults, self::$configRequired);
        
        // create client
        $client = new self($config->get('baseUrl'), $config);
        
        // set the service description
        $file = str_replace('{version}', $config->get('version'));
        $file = __DIR__ . "/Resources/$file";
        
        $client->setDescription(ServiceDescription::factory($file));
        
        return $client;
    }
}
