<?php


require_once './vendor/autoload.php';


$options = require_once('parameters.php');

$accessToken = \ClouSale\AmazonSellingPartnerAPI\SellingPartnerOAuth::getAccessTokenFromRefreshToken(
    $options['refresh_token'],
    $options['client_id'],
    $options['client_secret']
);

// var_dump($accessToken); die();


$config = \ClouSale\AmazonSellingPartnerAPI\Configuration::getDefaultConfiguration();
$config->setHost($options['endpoint']);
$config->setAccessToken($accessToken);
$config->setAccessKey($options['access_key']);
$config->setSecretKey($options['secret_key']);
$config->setRegion($options['region']);

try {
    $apiInstance = new \ClouSale\AmazonSellingPartnerAPI\Api\OrdersApi($config);
    $result = $apiInstance->getOrder('TEST_CASE_200');

    var_dump($result);
    var_dump($result->getPayload()->getAmazonOrderId());
} catch (Exception $e) {
    echo 'Exception when calling OrdersV0Api->getOrder: ', $e->getMessage(), PHP_EOL;
}


