<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class ClientDetails
 *
 * @package lucree\SDK
 */
class ClientDetails implements \JsonSerializable
{

    private $registration_age = 0;
    private $first_purchase_age = 0;
    private $last_purchase_age = 0;
    private $login_attempts = 0;
    private $orders_canceled = 0;
    private $cash_purchases = 0;
    private $online_cc_purchases = 0;
    private $offline_cc_purchases = 0;
    private $debit_purchases = 0;
    private $total_purchases = 0;

    /**
     * @return int
     */
    public function getRegistrationAge()
    {
        return $this->registration_age;
    }

    /**
     * @param int $registration_age
     *
     * @return ClientDetails
     */
    public function setRegistrationAge($registration_age)
    {
        $this->registration_age = $registration_age;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstPurchaseAge()
    {
        return $this->first_purchase_age;
    }

    /**
     * @param int $first_purchase_age
     *
     * @return ClientDetails
     */
    public function setFirstPurchaseAge($first_purchase_age)
    {
        $this->first_purchase_age = $first_purchase_age;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastPurchaseAge()
    {
        return $this->last_purchase_age;
    }

    /**
     * @param int $last_purchase_age
     *
     * @return ClientDetails
     */
    public function setLastPurchaseAge($last_purchase_age)
    {
        $this->last_purchase_age = $last_purchase_age;

        return $this;
    }

    /**
     * @return int
     */
    public function getLoginAttempts()
    {
        return $this->login_attempts;
    }

    /**
     * @param int $login_attempts
     *
     * @return ClientDetails
     */
    public function setLoginAttempts($login_attempts)
    {
        $this->login_attempts = $login_attempts;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrdersCanceled()
    {
        return $this->orders_canceled;
    }

    /**
     * @param int $orders_canceled
     *
     * @return ClientDetails
     */
    public function setOrdersCanceled($orders_canceled)
    {
        $this->orders_canceled = $orders_canceled;

        return $this;
    }

    /**
     * @return int
     */
    public function getCashPurchases()
    {
        return $this->cash_purchases;
    }

    /**
     * @param int $cash_purchases
     *
     * @return ClientDetails
     */
    public function setCashPurchases($cash_purchases)
    {
        $this->cash_purchases = $cash_purchases;

        return $this;
    }

    /**
     * @return int
     */
    public function getOnlineCcPurchases()
    {
        return $this->online_cc_purchases;
    }

    /**
     * @param int $online_cc_purchases
     *
     * @return ClientDetails
     */
    public function setOnlineCcPurchases($online_cc_purchases)
    {
        $this->online_cc_purchases = $online_cc_purchases;

        return $this;
    }

    /**
     * @return int
     */
    public function getOfflineCcPurchases()
    {
        return $this->offline_cc_purchases;
    }

    /**
     * @param int $offline_cc_purchases
     *
     * @return ClientDetails
     */
    public function setOfflineCcPurchases($offline_cc_purchases)
    {
        $this->offline_cc_purchases = $offline_cc_purchases;

        return $this;
    }

    /**
     * @return int
     */
    public function getDebitPurchases()
    {
        return $this->debit_purchases;
    }

    /**
     * @param int $debit_purchases
     *
     * @return ClientDetails
     */
    public function setDebitPurchases($debit_purchases)
    {
        $this->debit_purchases = $debit_purchases;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPurchases()
    {
        return $this->total_purchases;
    }

    /**
     * @param int $total_purchases
     *
     * @return ClientDetails
     */
    public function setTotalPurchases($total_purchases)
    {
        $this->total_purchases = $total_purchases;

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


