<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class OrderDetails
 *
 * @package lucree\SDK
 */
class OrderDetails implements \JsonSerializable
{

    /**
     * @var Items
     */
    private $items = [];
    /**
     * @var
     */
    private $store_pickup ;
    /**
     * @var int
     */
    private $ship_value;


    /**
     * OrderDetails constructor.
     */
    public function __construct()
    {
        $this->items = new Items();
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }



    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStorePickup()
    {
        return $this->store_pickup;
    }

    /**
     * @param mixed $store_pickup
     *
     * @return OrderDetails
     */
    public function setStorePickup($store_pickup)
    {
        $this->store_pickup = $store_pickup;

        return $this;
    }

    /**
     * @return int
     */
    public function getShipValue()
    {
        return $this->ship_value;
    }

    /**
     * @param int $ship_value
     *
     * @return OrderDetails
     */
    public function setShipValue($ship_value)
    {
        $this->ship_value = $ship_value;

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


