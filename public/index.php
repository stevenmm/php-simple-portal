<?php
/**
 * Author: steven
 * Date: 4/5/17
 * Time: 11:28 AM
 */

!defined('APP_PATH') && define('APP_PATH', __DIR__ . '/..');
!defined('APP_DIR') && define('APP_DIR', APP_PATH . '/');

//composer autoload
/** @noinspection PhpIncludeInspection */
$loader = require APP_PATH . '/vendor/autoload.php';
$loader->addPsr4('Portal\\', APP_PATH . '/apps');

include APP_PATH . '/apps/Application.php';

try {
    $app = new \Portal\Application();
    $app->run();
} catch (\Exception $e) {}

//start authenticator process
$ga     = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
$qr     = $ga->getQRCodeGoogleUrl('MM', $secret);