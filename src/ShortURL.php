<?php
/**
 * Created by PhpStorm.
 * User: Ekk
 * Date: 07-Apr-20
 * Time: 4:11 PM
 */

namespace Ekkalak\Rebrandly;

use GuzzleHttp\Client;

class ShortURL
{

    const API_URL = 'https://api.rebrandly.com/v1/links';
    private $client, $request, $token, $workspace, $domain, $title, $destination;

    /**
     * ShortURL constructor.
     * @param $token
     * @param string $workspace
     */
    public function __construct($token, $workspace = '')
    {
        $this->token = $token;
        $this->client = new Client();
        $this->request = [
            'headers' => [
                'Content-Type' => 'application/json',
                'apikey' => $this->token,
            ]
        ];
        if ( !empty($workspace) ) {
            $this->workspace = $workspace;
            $this->request['headers'][] = [
                'workspace' => $this->workspace,
            ];
        }
    }

    /**
     * Create short url
     * @param $destination
     * @param string $title
     * @param string $domain
     * @return false|string
     */
    public function shortUrl($destination, $title = '', $domain = '')
    {
        $this->destination = $destination;
        $this->title = $title;
        $this->domain = $domain;
        $this->request['body'] = json_encode([
            'destination' => $this->destination,
            'title' => $this->title,
            'domain' => [
                'fullName' => $this->domain,
            ],
        ]);
        $response = $this->client->request('POST', self::API_URL, $this->request);
        $shortUrl = json_decode($response->getBody(), true);
        $shortUrl = 'https://' . $shortUrl['shortUrl'];
        return json_encode(['shortUrl' => $shortUrl]);
    }
}