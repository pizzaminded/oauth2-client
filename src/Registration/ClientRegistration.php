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
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if(empty($options['endpoint'])) {
            throw new \InvalidArgumentException('"endpoint" option is required.');
        }

        $this->endpoint = $options['missing'];
        $this->options = $options;
    }

    /**
     * @param ClientMetadata $metadata
     * @param string|null $initialAccessToken
     */
    public function register(ClientMetadata $metadata, $initialAccessToken = null)
    {

    }

}