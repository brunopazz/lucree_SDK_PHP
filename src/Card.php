<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class Card
 *
 * @package lucree\SDK
 */
class Card implements \JsonSerializable
{

    /**
     * @var
     */
    private $pan;
    /**
     * @var
     */
    private $expiry_mm;
    /**
     * @var
     */
    private $expiry_yyyy;
    /**
     * @var
     */
    private $security_code;
    /**
     * @var
     */
    private $type;



    /**
     * @return mixed
     */
    public function getPan()
    {
        return $this->pan;
    }

    /**
     * @param mixed $pan
     *
     * @return Card
     */
    public function setPan($pan)
    {
        $this->pan = $pan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiryMm()
    {
        return $this->expiry_mm;
    }

    /**
     * @param mixed $expiry_mm
     *
     * @return Card
     */
    public function setExpiryMm($expiry_mm)
    {
        $this->expiry_mm = $expiry_mm;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiryYyyy()
    {
        return $this->expiry_yyyy;
    }

    /**
     * @param mixed $expiry_yyyy
     *
     * @return Card
     */
    public function setExpiryYyyy($expiry_yyyy)
    {
        $this->expiry_yyyy = $expiry_yyyy;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->security_code;
    }

    /**
     * @param mixed $security_code
     *
     * @return Card
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = $security_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return Card
     */
    public function setType($type)
    {
        $this->type = $type;

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
}