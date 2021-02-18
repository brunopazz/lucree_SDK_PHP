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
class Token implements \JsonSerializable
{

    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $security_code;


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * @param $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

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
     * @param $security_code
     *
     * @return $this
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = $security_code;

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