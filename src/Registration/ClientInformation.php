<?php


namespace League\OAuth2\Client\Registration;


class ClientInformation
{

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string|null
     */
    protected $clientSecret;

    /**
     * @var int|null
     */
    protected $clientIdIssuedAt;

    /**
     * @var int|null
     */
    protected $clientSecretExpiresAt;

    public function __construct(array $data)
    {
        if(empty($data['client_id'])) {
            throw new \InvalidArgumentException('Required option not passed: "client_id"');
        }

        $this->clientId = $data['client_id'];

        if(!empty($data['client_secret'])) {
            $this->clientSecret = $data['client_secret'];
        }

        if(!empty($data['client_id_issued_at'])) {
            $this->clientIdIssuedAt = $data['client_id_issued_at'];
        }

        if(!empty($data['client_secret_expires_at'])) {
            if($this->clientSecret !== null) {
                throw new \InvalidArgumentException('Required option not passed: "client_secret_expires_at"');
            }

            $this->clientSecretExpiresAt = $data['client_secret_expires_at'];
        }
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string|null
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return int|null
     */
    public function getClientIdIssuedAt()
    {
        return $this->clientIdIssuedAt;
    }

    /**
     * @return int|null
     */
    public function getClientSecretExpiresAt()
    {
        return $this->clientSecretExpiresAt;
    }

}