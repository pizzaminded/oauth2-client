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

use InvalidArgumentException;

/**
 * @link https://tools.ietf.org/html/rfc7591#section-2
 */
class ClientMetadata
{

    /**
     * @var array
     */
    protected $internationalizedMetadata = [];

    /**
     * @var string[]
     */
    protected $redirectUris = [];

    /**
     * @var string
     */
    protected $tokenEndpointAuthMethod;

    /**
     * @var array
     */
    protected $grantTypes = [];

    /**
     * @var array
     */
    protected $responseTypes = [];

    /**
     * @var string
     */
    protected $clientName;

    /**
     * @var string
     */
    protected $clientUri;

    /**
     * @var string
     */
    protected $logoUri;

    /**
     * @var string
     */
    protected $scope;

    /**
     * @var array
     */
    protected $contacts = [];

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (empty($options['redirectUris'])) {
            throw new InvalidArgumentException('Required option not passed: "redirectUris"');
        }

        $this->redirectUris = $options['redirectUris'];

        if (!empty($options['tokenEndpointAuthMethod'])) {
            $this->tokenEndpointAuthMethod = $options['tokenEndpointAuthMethod'];
        }

        if (!empty($options['grantTypes'])) {
            $this->grantTypes = $options['grantTypes'];
        }

        if (!empty($options['responseTypes'])) {
            $this->responseTypes = $options['responseTypes'];
        }

        if (!empty($options['clientName'])) {
            $this->clientName = $options['clientName'];
        }

        if (!empty($options['clientUri'])) {
            $this->clientUri = $options['clientUri'];
        }

        if (!empty($options['logoUri'])) {
            $this->logoUri = $options['logoUri'];
        }

        if (!empty($options['scope'])) {
            $this->scope = $options['scope'];
        }

        if (!empty($options['contacts'])) {
            $this->contacts = $options['contacts'];
        }
    }

    public function addInternationalizedMetadata($language, array $options = [])
    {
        $this->internationalizedMetadata[$language] = $options;
    }

    /**
     * @return array
     */
    public function getInternationalizedMetadata()
    {
        return $this->internationalizedMetadata;
    }

    /**
     * @return string
     */
    public function getTokenEndpointAuthMethod()
    {
        return $this->tokenEndpointAuthMethod;
    }

    /**
     * @return array
     */
    public function getGrantTypes()
    {
        return $this->grantTypes;
    }

    /**
     * @return array
     */
    public function getResponseTypes()
    {
        return $this->responseTypes;
    }

    /**
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @return string
     */
    public function getClientUri()
    {
        return $this->clientUri;
    }

    /**
     * @return string
     */
    public function getLogoUri()
    {
        return $this->logoUri;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return array
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @return string[]
     */
    public function getRedirectUris()
    {
        return $this->redirectUris;
    }
}