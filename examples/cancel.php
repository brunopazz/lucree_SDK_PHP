<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 8:44 PM
 */

namespace lucree\SDK;

include_once("../vendor/autoload.php");

$lucree     = new Lucree('xxxxxxxxxxx');
$payment_id = "xxxxxxxxxxx";
$amount     = 1000;

//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setSecurityCode(123);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);
$card->setType('creditcard');

//Token
$token = new Token();
$token->setSecurityCode('123');
$token->setData('');

$response = $lucree->cancel($payment_id, $amount, $card, $token);

if ($response->isAccepted()) { //APPROVED

    print $response->toJSON();

} elseif ($response->isDenied()) { //DENIED - FALIED

    print $response->toJSON();

} elseif ($response->isBlocked()) { // BLOCKED

    print $response->toJSON();

} else { // OTHER ERRORS

    print $response->toJSON();

}