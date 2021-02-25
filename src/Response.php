<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 11:38 PM
 */

namespace lucree\SDK;


/**
 * Class Response
 *
 * @package lucree\SDK
 */
class Response implements \JsonSerializable
{

    /**
     * @var
     */
    private $payment_id;
    /**
     * @var
     */
    private $result_code;
    /**
     * @var
     */
    private $response_code;
    /**
     * @var
     */
    private $response_text;
    /**
     * @var
     */
    private $authorization_code;
    /**
     * @var
     */
    private $authorization_nsu;
    /**
     * @var
     */
    private $authorized_amount;
    /**
     * @var
     */
    private $risk_management;
    /**
     * @var
     */
    private $error;
    /**
     * @var
     */
    private $token;
    /**
     * @var
     */
    private $truncated_card;


    /**
     * Response constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->mapperJson($response);
    }

    /**
     * @param $json
     *
     * @return $this
     */
    public function mapperJson($json)
    {


        if ( ! is_array($json)) {
            return $this;
        }

        array_walk_recursive($json, function ($value, $key) use (&$json) {

            if (property_exists($this, $key)) {
                if (empty($this->$key)) {
                    $this->$key = $value;
                }
            }
        });

        if (isset($json['risk_management'])) {
            $this->risk_management = $json['risk_management'];
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return Response
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTruncatedCard()
    {
        return $this->truncated_card;
    }

    /**
     * @param mixed $truncated_card
     *
     * @return Response
     */
    public function setTruncatedCard($truncated_card)
    {
        $this->truncated_card = $truncated_card;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getRiskManagement()
    {
        return $this->risk_management;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     * @return mixed
     */
    public function getResultCode()
    {
        return $this->result_code;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->response_code;
    }

    /**
     * @return mixed
     */
    public function getResponseText()
    {
        return $this->response_text;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationNsu()
    {
        return $this->authorization_nsu;
    }

    /**
     * @return mixed
     */
    public function getAuthorizedAmount()
    {
        return $this->authorized_amount;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = json_encode($response,
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    }

    /**
     * @return bool
     */
    public function isAccepted()
    {

        if (isset($this->result_code) && $this->result_code == "ACCEPTED") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isDenied()
    {

        if (isset($this->result_code) && $this->result_code == "DENIED") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isBlocked()
    {

        if (isset($this->result_code) && $this->result_code == "BLOCKED") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function hasError()
    {

        if (isset($this->error)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return false|string
     */
    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        $vars       = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return $vars_clear;
    }
}