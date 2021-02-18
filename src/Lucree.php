<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 10:02 PM
 */

namespace lucree\SDK;


/**
 * Class Lucree
 *
 * @package lucree\SDK
 */
class Lucree
{

    /**
     * @var
     */
    private $credential;

    /**
     * Lucree constructor.
     *
     * @param $credential
     */
    public function __construct($credential)
    {
        $this->credential = $credential;
    }

    /**
     * @return mixed
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param mixed $credential
     *
     * @return Lucree
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;

        return $this;
    }


    /**
     * @param Transaction $transaction
     *
     * @return Response
     */
    public function authorize(Transaction $transaction){

        $request = new Request(self::getCredential());
        try{
            $result = $request->post("https://ecommerce.lucree.com.br/v2/payments/pay",$transaction->toJSON());
        }catch (\Exception $exception){
            $result = ['error'=>$exception->getMessage()];
        }
        $response = new Response($result);
        return $response;
    }

    /**
     * @param            $payment_id
     * @param bool       $amount
     * @param Card|null  $card
     * @param Token|null $token
     *
     * @return false|string
     */
    public function cancel($payment_id, $amount = false,Card $card = null,Token $token = null){

        $json = ["payment_id" => $payment_id];

        if (!empty($amount)) {
            $json["amount"] = $amount;
        }

        if (!empty($card)) {
            $json["card"] = $card;
        }

        if (!empty($token)) {
            $json["token"] = $token;
        }

        $request = new Request(self::getCredential());
        try{
            $result = $request->post("https://ecommerce.lucree.com.br/v2/payments/cancel",json_encode($json));
        }catch (\Exception $exception){
            $result = ['error'=>$exception->getMessage()];
        }
        $response = new Response($result);
        return $response->toJSON();
    }

    /**
     * @param      $payment_id
     * @param bool $amount
     * @param bool $confirm
     *
     * @return false|string
     */
    public function capture($payment_id, $amount = false, $confirm = true){

        $json = ["payment_id" => $payment_id];

        if (!empty($amount)) {
            $json["amount"] = $amount;
        }

        if (!empty($confirm)) {
            $json["confirm"] = $confirm;
        }

        $request = new Request(self::getCredential());
        try{
            $result = $request->post("https://ecommerce.lucree.com.br/v2/payments/capture",json_encode($json));
        }catch (\Exception $exception){
            $result = ['error'=>$exception->getMessage()];
        }
        $response = new Response($result);
        return $response->toJSON();
    }

}