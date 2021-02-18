<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class Items
 *
 * @package lucree\SDK
 */
class Items implements \JsonSerializable
{

    private $sku;
    private $description;
    private $quantity;
    private $unitary_value;

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     *
     * @return Items
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return Items
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     *
     * @return Items
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnitaryValue()
    {
        return $this->unitary_value;
    }

    /**
     * @param mixed $unitary_value
     *
     * @return Items
     */
    public function setUnitaryValue($unitary_value)
    {
        $this->unitary_value = $unitary_value;

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


