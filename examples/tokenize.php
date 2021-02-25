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

$lucree      = new Lucree('xxxxx',false);

$transaction = new Transaction();
$transaction->setId("02221");
$transaction->setAmount(1000);
$transaction->setCaptureManually(true);
$transaction->setRiskBypass(true);

//Installment
$installment = new Installment();
$installment->setNumberOfInstallments(2);
$transaction->setInstallment($installment);
$installment->setAmountPerInstallment(500);
//$installment->setDownPaymentAmount(10);

//Cardholder
$cardholder = new Cardholder();
$cardholder->setFirstName("John");
$cardholder->setLastName("Doe");
$cardholder->setPhoneType("Home");
$cardholder->setPhoneNumber("1199999999");
$cardholder->setEmail("john.doe@example.com");
$cardholder->setDocumentNumber("333.333.333.33");
$transaction->setCardholder($cardholder);


//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);

print "Tokenizando ... <br>";
$tokenized = $lucree->tokenizer($card);

if($tokenized->isAccepted()) {
    print "Tokenizando ... ok ".$tokenized->getToken()." <br>";
    //Token
    $token = new Token();
    $token->setSecurityCode('123');
    $token->setData($tokenized->getToken());
    $transaction->setToken($token);


    print "Autorizando ... <br>";
    $response = $lucree->authorize($transaction);

    if ($response->isAccepted()) { //APPROVED
        print "Autorizando ... ok  ".$response->getPaymentId()."<br>";
        print "Capturando ... <br>";

        $capture = $lucree->capture($response->getPaymentId(),
            $transaction->getAmount(), true);

        if ($capture->isAccepted()) {
            print "Capturado ... OK<br>";
            print "Cancelando ... ".$transaction->getAmount()."<br>";

            $cancel = $lucree->cancel($response->getPaymentId(),
                $transaction->getAmount(), $card);

            if ($cancel->isAccepted()) {
                print "Calcelando ... OK<br>";

            } else {

                print "Calcelando ... error<br>";
                print $cancel->toJSON();

            }

        }

    } elseif ($response->isDenied()) { //DENIED - FALIED

        print $response->toJSON();

    } elseif ($response->isBlocked()) { // BLOCKED

        print $response->toJSON();

    } else { // OTHER ERRORS

        print $response->toJSON();

    }
}






