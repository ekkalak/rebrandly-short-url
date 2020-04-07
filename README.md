# Rebrandly Short URL
Rebrandly - Short and share URL with PHP.

## Requirement

- Rebrandly API https://rebrandly.com
- PHP
- Composer
- Guzzle Client

## Install
``` composer require ekkalak/rebrandly-short-url```

## Usage

```php
<?php 

require_once '../vendor/autoload.php';

use Ekkalak\Rebrandly\ShortURL;

$short_url = new ShortURL('YOUR-API-HERE', 'YOUR-WORKSPACE');

// Make your link shorter
// slashtag is not available
// https://developers.rebrandly.com/docs
$response = $short_url->shortUrl('https://www.your-domain.com/your-url', 'test short url', 'your-domain');

var_dump($response);

```