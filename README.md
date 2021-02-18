## Criar e autorizar um pagamento
https://ecommerce.lucree.com.br/#operation/createPayment  
##### No momento da criação do pagamento o mesmo é submetido para a autorização junto a entidade responsável.

  
````php
<?php
$lucree      = new Lucree('xxxxxxxxx'); // LUCREE CREDENTIAL
$transaction = new Transaction();
$transaction->setId("teste");
$transaction->setAmount(1000);
$transaction->setCaptureManually(false);
$transaction->setRiskBypass(false);


//Card
$card = new Card();
$card->setPan(411111111111111);
$card->setSecurityCode(123);
$card->setExpiryMm(12);
$card->setExpiryYyyy(2021);
$card->setType('creditcard');
$transaction->setCard($card);

//Token
$token = new Token();
$token->setSecurityCode('123');
$token->setData('');
$transaction->setToken($token);


//Installment
$installment = new Installment();
$installment->setNumberOfInstallments(12);
$installment->setAmountPerInstallment(1000);
$installment->setDownPaymentAmount(1000);
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



```json
{
  "id": "string",
  "amount": 0,
  "capture_manually": false,
  "risk_bypass": false,
  "card": {
    "pan": "string",
    "expiry_mm": "string",
    "expiry_yyyy": "string",
    "security_code": "string",
    "type": "string"
  },
  "token": {
    "data": "string",
    "security_code": "string"
  },
  "installment": {
    "number_of_installments": 0,
    "down_payment_amount": 0,
    "amount_per_installment": 0
  },
  "cardholder": {
    "first_name": "string",
    "last_name": null,
    "phone_type": "HOME",
    "phone_number": "string",
    "email": "string",
    "document_number": "string"
  },
  "billing_address": {
    "street": "string",
    "number": "string",
    "neighborhood": "string",
    "country_code": "string",
    "city_name": "string",
    "state_code": "string",
    "postal_code": "string"
  },
  "delivery_address": {
    "street": "string",
    "number": "string",
    "neighborhood": "string",
    "country_code": "string",
    "city_name": "string",
    "state_code": "string",
    "postal_code": "string"
  },
  "order_details": {
    "items": [
      {
        "sku": "string",
        "description": "string",
        "quantity": 0,
        "unitary_value": 0
      }
    ],
    "store_pickup": "string",
    "ship_value": 0
  },
  "device_fingerprint": {
    "session_id": "string",
    "id_address": "string",
    "app_version": "string",
    "os": "string"
  },
  "store_details": {
    "id": "string",
    "name": "string"
  },
  "client_details": {
    "registration_age": 0,
    "first_purchase_age": 0,
    "last_purchase_age": 0,
    "login_attempts": 0,
    "orders_canceled": 0,
    "cash_purchases": 0,
    "online_cc_purchases": 0,
    "offline_cc_purchases": 0,
    "debit_purchases": 0,
    "total_purchases": 0
  }
}
```