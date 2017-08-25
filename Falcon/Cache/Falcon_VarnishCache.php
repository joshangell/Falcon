<?php
namespace Falcon\Cache;

/**
 * Class Falcon_VarnishCache
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon\Cache
 * @since     0.0.1
 */
class Falcon_VarnishCache implements Falcon_CacheInterface
{

    /**
     * @param array $keys
     */
    public function purgeByKeys(array $keys = [])
    {

        $keyString = implode(' ', $keys);
        $url = 'http://0.0.0.0:8080/';

        // Make the client
        $client = new \Guzzle\Http\Client($url);

        // Set the Accept header
        $client->setDefaultOption('headers/Accept', '*/*');

        // Create the PURGE request
        $request = $client->createRequest('PURGE', null, [
            'xkey-purge' => $keyString
        ]);

        // Send it
        try {
            $response = $request->send();

            if ( $response->isSuccessful() ) {

            } else {
                $errorMsg = \Craft\Craft::t('Purge failed. Status: {status}. Message: {message}.', [
                    'status' => $response->getStatusCode(),
                    'message' => $response->getReasonPhrase()
                ]);
                throw new \Exception($errorMsg);
            }
        } catch (\Exception $e) {
            \Craft\FalconPlugin::log($e->getMessage(), \Craft\LogLevel::Error);
        }

    }

}