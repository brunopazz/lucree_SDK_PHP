<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class DeviceFingerprint
 *
 * @package lucree\SDK
 */
class DeviceFingerprint implements \JsonSerializable
{

    private $session_id;
    private $id_address;
    private $app_version;
    private $os;

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * @param mixed $session_id
     *
     * @return DeviceFingerprint
     */
    public function setSessionId($session_id)
    {
        $this->session_id = $session_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAddress()
    {
        return $this->id_address;
    }

    /**
     * @param mixed $id_address
     *
     * @return DeviceFingerprint
     */
    public function setIdAddress($id_address)
    {
        $this->id_address = $id_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAppVersion()
    {
        return $this->app_version;
    }

    /**
     * @param mixed $app_version
     *
     * @return DeviceFingerprint
     */
    public function setAppVersion($app_version)
    {
        $this->app_version = $app_version;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param mixed $os
     *
     * @return DeviceFingerprint
     */
    public function setOs($os)
    {
        $this->os = $os;

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


