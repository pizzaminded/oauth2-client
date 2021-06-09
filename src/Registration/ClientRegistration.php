<?php
/**
 * This file is part of the league/oauth2-client library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Alex Bilbie <hello@alexbilbie.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link http://thephpleague.com/oauth2-client/ Documentation
 * @link https://packagist.org/packages/league/oauth2-client Packagist
 * @link https://github.com/thephpleague/oauth2-client GitHub
 */

namespace League\OAuth2\Client\Registration;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use League\OAuth2\Client\Tool\RequestFactory;
use Psr\Http\Message\RequestInterface;

/**
 * @link https://tools.ietf.org/html/rfc7591
 */
class ClientRegistration
{

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (empty($options['endpoint'])) {
            throw new \InvalidArgumentException('"endpoint" option is required.');
        }

        $this->endpoint = $options['endpoint'];
        $this->options = $options;

        $this->requestFactory = new RequestFactory();
        $this->httpClient = new HttpClient();
    }

    /**
     * @param ClientMetadata $metadata
     * @param string|null $initialAccessToken
     */
    public function register(ClientMetadata $metadata, $initialAccessToken = null)
    {
        $payload = [
            'redirect_uris'=> $metadata->getRedirectUris()
        ];

        $headers = [];
        $headers['Content-Type'] = 'application/json';
        if($initialAccessToken !== null) {
            $headers['Authorization']  = $initialAccessToken;
        }

        $request = $this->getClientRegistrationRequest($this->endpoint, $payload, $headers);
        $response = $this->getParsedResponse($request);

        return new ClientInformation($response);

    }

    protected function getClientRegistrationRequest($endpoint, array $payload, array $headers = [])
    {
        return $this->requestFactory->getRequest('POST', $endpoint, $headers, json_encode($payload));
    }

    protected function getParsedResponse(RequestInterface $request)
    {
        $response = $this->httpClient->send($request);
        $body = (string)$response->getBody();

        return json_decode($body, true);
    }

}