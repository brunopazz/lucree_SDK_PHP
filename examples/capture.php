<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 8:44 PM
 */

namespace lucree\SDK;

include_once("../vendor/autoload.php");

$lucree      = new Lucree('xxxxx==',false);
$payment_id = "xxxxxxxxxxx";
$amount     = 1000;


$response = $lucree->capture($payment_id, $amount, true);

if ($response->isAccepted()) { //APPROVED

    print $response->toJSON();

} elseif ($response->isDenied()) { //DENIED - FALIED

    print $response->toJSON();

} elseif ($response->isBlocked()) { // BLOCKED

    print $response->toJSON();

} else { // OTHER ERRORS

    print $response->toJSON();

}