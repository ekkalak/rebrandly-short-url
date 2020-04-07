<?php
/**
 * Created by PhpStorm.
 * User: Ekk
 * Date: 07-Apr-20
 * Time: 4:31 PM
 */

require_once '../vendor/autoload.php';

use Ekkalak\Rebrandly\ShortURL;

$token = 'YOUR-API-HERE';

$workspace = '';

$short_url = new ShortURL($token, $workspace);

$response = $short_url->shortUrl('https://www.your-domain.com/your-url', 'test short url','');

var_dump($response);