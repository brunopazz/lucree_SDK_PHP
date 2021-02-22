<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2/17/21
 * Time: 8:44 PM
 */

namespace lucree\SDK;

use function MongoDB\BSON\toJSON;

include_once("../vendor/autoload.php");

$lucree      = new Lucree('xxxxxxxxxxx');

$transaction = new Transaction();
$transaction->setId("02221");
$transaction->setAmount(1000);
$transaction->setCaptureManually(true);


//Installment
$installment = new Installment();
$installment->setNumberOfInstallments(12);
$transaction->setInstallment($installment);
//$installment->setAmountPerInstallment(1000);
//$installment->setDownPaymentAmount(10);

//Cardholder
$cardholder = new Cardholder();
$cardholder->setFirstName("John");
$cardholder->setLastName("Doe");
$cardholder->setPhoneType("Home");
$cardholder->setPhoneNumber("+551199999999");
$cardholder->setEmail("john.doe@example.com");
$cardholder->setDocumentNumber("333.333.333.33");
$transaction->setCardholder($cardholder);


//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);
//$card->setType(CardType::VISA);
//$card->setSecurityCode(123);

$tokenized = $lucree->tokenizer($card);

if($tokenized->isAccepted()){

    //Token
    $token = new Token();
    $token->setSecurityCode('123');
    $token->setData($tokenized->getToken());
    $transaction->setToken($token);

    $response = $lucree->authorize($transaction);

    if ($response->isAccepted()) { //APPROVED

        print $response->toJSON();

    } elseif ($response->isDenied()) { //DENIED - FALIED

        print $response->toJSON();

    } elseif ($response->isBlocked()) { // BLOCKED

        print $response->toJSON();

    } else { // OTHER ERRORS

        print $response->toJSON();

    }
}else{
    print $tokenized->toJSON();
}







