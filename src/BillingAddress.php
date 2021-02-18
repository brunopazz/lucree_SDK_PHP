<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class BillingAddress
 *
 * @package lucree\SDK
 */
class BillingAddress implements \JsonSerializable
{

    private $street;
    private $number;
    private $neighborhood;
    private $country_code;
    private $city_name;
    private $state_code;
    private $postal_code;

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     *
     * @return BillingAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     *
     * @return BillingAddress
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param mixed $neighborhood
     *
     * @return BillingAddress
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     *
     * @return BillingAddress
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * @param mixed $city_name
     *
     * @return BillingAddress
     */
    public function setCityName($city_name)
    {
        $this->city_name = $city_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStateCode()
    {
        return $this->state_code;
    }

    /**
     * @param mixed $state_code
     *
     * @return BillingAddress
     */
    public function setStateCode($state_code)
    {
        $this->state_code = $state_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     *
     * @return BillingAddress
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
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
