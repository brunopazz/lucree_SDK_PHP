<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 8:23 PM
 */

namespace lucree\SDK;


/**
 * Class Transaction
 *
 * @package lucree\SDK
 */
class Transaction implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id = "";
    /**
     * @var int
     */
    private $amount = 0;
    /**
     * @var bool
     */
    private $capture_manually = false;
    /**
     * @var bool
     */
    private $risk_bypass = false;
    /**
     * @var
     */
    private $card;
    /**
     * @var
     */
    private $token;
    /**
     * @var
     */
    private $installment;
    /**
     * @var
     */
    private $cardholder;
    /**
     * @var
     */
    private $billing_address;
    /**
     * @var
     */
    private $delivery_address;
    /**
     * @var
     */
    private $order_details;
    /**
     * @var
     */
    private $device_fingerprint;
    /**
     * @var
     */
    private $store_details;
    /**
     * @var
     */
    private $client_details;



    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Transaction
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCaptureManually()
    {
        return $this->capture_manually;
    }

    /**
     * @param bool $capture_manually
     *
     * @return Transaction
     */
    public function setCaptureManually($capture_manually)
    {
        $this->capture_manually = $capture_manually;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRiskBypass()
    {
        return $this->risk_bypass;
    }

    /**
     * @param bool $risk_bypass
     *
     * @return Transaction
     */
    public function setRiskBypass($risk_bypass)
    {
        $this->risk_bypass = $risk_bypass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }


    /**
     * @param Card $card
     *
     * @return Card
     */
    public function setCard(Card $card)
    {
        $this->card = $card;

        return $card;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @param Token $token
     *
     * @return $this
     */
    public function setToken(Token $token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstallment()
    {
        return $this->installment;
    }


    /**
     * @param Installment $installment
     *
     * @return $this
     */
    public function setInstallment(Installment $installment)
    {
        $this->installment = $installment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardholder()
    {
        return $this->cardholder;
    }


    /**
     * @param Cardholder $cardholder
     *
     * @return $this
     */
    public function setCardholder(Cardholder $cardholder)
    {
        $this->cardholder = $cardholder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * @param mixed $billing_address
     *
     * @return Transaction
     */
    public function setBillingAddress(BillingAddress $billing_address)
    {
        $this->billing_address = $billing_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveryAddress()
    {
        return $this->delivery_address;
    }


    /**
     * @param DeliveryAddress $delivery_address
     *
     * @return $this
     */
    public function setDeliveryAddress(DeliveryAddress $delivery_address)
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderDetails()
    {
        return $this->order_details;
    }


    /**
     * @param OrderDetails $order_details
     *
     * @return $this
     */
    public function setOrderDetails(OrderDetails $order_details)
    {
        $this->order_details = $order_details;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeviceFingerprint()
    {
        return $this->device_fingerprint;
    }


    /**
     * @param DeviceFingerprint $device_fingerprint
     *
     * @return $this
     */
    public function setDeviceFingerprint(DeviceFingerprint $device_fingerprint)
    {
        $this->device_fingerprint = $device_fingerprint;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStoreDetails()
    {
        return $this->store_details;
    }

    /**
     * @param mixed $store_details
     *
     * @return Transaction
     */
    public function setStoreDetails(StoreDetails $store_details)
    {
        $this->store_details = $store_details;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientDetails()
    {
        return $this->client_details;
    }


    /**
     * @param ClientDetails $client_details
     *
     * @return $this
     */
    public function setClientDetails(ClientDetails $client_details)
    {
        $this->client_details = $client_details;

        return $this;
    }

    public function jsonSerialize()
    {
        $vars       = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });
        return $vars_clear;
    }

    public function toJSON()
    {
        return json_encode(self::jsonSerialize(), JSON_PRETTY_PRINT);
    }
}