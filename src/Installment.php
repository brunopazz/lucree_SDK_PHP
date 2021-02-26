<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 7:47 PM
 */

namespace lucree\SDK;


/**
 * Class Installment
 *
 * @package lucree\SDK
 */
class Installment implements \JsonSerializable
{

    /**
     * @var
     */
    private  $number_of_installments ;
    /**
     * @var
     */
    private $down_payment_amount;

    private $amount_per_installment;



    /**
     * @return mixed
     */
    public function getNumberOfInstallments()
    {
        return $this->number_of_installments;
    }

    /**
     * @param mixed $number_of_installments
     *
     * @return Installment
     */
    public function setNumberOfInstallments($number_of_installments)
    {
        $this->number_of_installments = (integer) $number_of_installments;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDownPaymentAmount()
    {
        return $this->down_payment_amount;
    }

    /**
     * @param mixed $down_payment_amount
     *
     * @return Installment
     */
    public function setDownPaymentAmount($down_payment_amount)
    {
        $this->down_payment_amount = (string) $down_payment_amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountPerInstallment()
    {
        return $this->amount_per_installment;
    }

    /**
     * @param mixed $amount_per_installment
     *
     * @return Installment
     */
    public function setAmountPerInstallment($amount_per_installment)
    {
        $this->amount_per_installment =   (integer) $amount_per_installment;

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