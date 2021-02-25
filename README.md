# Instalação
##### via composer
````shell
composer require brunopazz/lucree-sdk-php-gateway
````
# Ambientes
### Stage
https://ecommerce-stage.lucree.com.br
### Production
https://ecommerce.lucree.com.br


# Autenticação
##### trocar 'xxxxxxxxx' pela chave fornecida pela Lucree
````php
<?php
// LUCREE MODO PRODUTIVO
$lucree = new Lucree('xxxxxxxxx',true); 

// LUCREE MODO STAGE
$lucree = new Lucree('xxxxxxxxx',false); 
````
# Criar e autorizar um pagamento
https://ecommerce.lucree.com.br/#operation/createPayment  
##### No momento da criação do pagamento o mesmo é submetido para a autorização junto a entidade responsável.

  
````php
<?php
$lucree      = new Lucree('xxxxx==',false);
$transaction = new Transaction();
$transaction->setId("02221");
$transaction->setAmount(1000);
$transaction->setCaptureManually(true);
$transaction->setRiskBypass(true);

//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setSecurityCode(123);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);
$card->setType(CardType::VISA);
$transaction->setCard($card);

//Installment
$installment = new Installment();
$installment->setNumberOfInstallments(2);
$installment->setAmountPerInstallment(500);
//$installment->setDownPaymentAmount(10);
$transaction->setInstallment($installment);

//Cardholder
$cardholder = new Cardholder();
$cardholder->setFirstName("John");
$cardholder->setLastName("Doe");
$cardholder->setPhoneType("Home");
$cardholder->setPhoneNumber("+551199999999");
$cardholder->setEmail("john.doe@example.com");
$cardholder->setDocumentNumber("333.333.333.33");
$transaction->setCardholder($cardholder);

//BillingAddress
$billing_address = new BillingAddress();
$billing_address->setStreet('Rua john doe');
$billing_address->setNumber('123');
$billing_address->setNeighborhood('centro');
$billing_address->setCountryCode('BR');
$billing_address->setCityName('SAO PAULO');
$billing_address->setStateCode('SP');
$billing_address->setPostalCode('08742-350');
$transaction->setBillingAddress($billing_address);

//DeliveryAddress
$delivery_address = new DeliveryAddress();
$delivery_address->setStreet('Rua john doe');
$delivery_address->setNumber('123');
$delivery_address->setNeighborhood('centro');
$delivery_address->setCountryCode('BR');
$delivery_address->setCityName('SAO PAULO');
$delivery_address->setStateCode('SP');
$delivery_address->setPostalCode('08742-350');
$transaction->setDeliveryAddress($delivery_address);

//OrderDetails
$order_details = new OrderDetails();
//Items 1
$item1 = new Items();
$item1->setSku('d12we');
$item1->setDescription('description product');
$item1->setUnitaryValue('100');

//Items 1
$item2 = new Items();
$item2->setSku('d12we3');
$item2->setDescription('description product');
$item2->setUnitaryValue('100');
$order_details->setItems([$item1, $item2]);
$transaction->setOrderDetails($order_details);

//DeviceFingerprint
$device_fingerprint = new DeviceFingerprint();
$device_fingerprint->setSessionId('setSessionId');
$device_fingerprint->setIdAddress('setIdAddress');
$device_fingerprint->setAppVersion('setAppVersion');
$device_fingerprint->setOs('setOs');
$transaction->setDeviceFingerprint($device_fingerprint);

//StoreDetails
$store_details = new StoreDetails();
$store_details->setId('0001');
$store_details->setName('store name');
$transaction->setStoreDetails($store_details);

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
````

# Cancelar um pagamento
https://ecommerce.lucree.com.br/#operation/cancelPayment
##### Cancela um pagamento que foi previamente autorizado, esta ação não é executada on-line, ou seja, esta solicitação pode ser atendida após análise futura.
````php
<?php   
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
````

# Capturar um pagamento
https://ecommerce.lucree.com.br/#operation/capturePayment
##### Captura um pagamento autorizado previamente. Esta operação deve ser utilizada, caso o pagamento tenha sido efetuado com o atributo captura manual ativado.
      
````php
<?php  
$lucree     = new Lucree('xxxxxxxxxxx');
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
````

# Token Card
https://ecommerce.lucree.com.br/#operation/tokenizeCard
##### Cria um token através de um número do cartão, que posteriormente pode ser utilizado para enviar pagamentos, sem a necessidade do número do cartão.
     

````php
<?php  
//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);


$tokenized = $lucree->tokenizer($card);

if($tokenized->isAccepted()){


}
````


