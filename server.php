<?php
require 'braintree-php-3.10.0/lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('fsjn4s3f2n24qbkc');
Braintree_Configuration::publicKey('7yy3x845kxrghjnb');
Braintree_Configuration::privateKey('972806a4d585aea8f99e1d56de2004a3');

$clientToken = Braintree_ClientToken::generate();

echo ($clientToken);

$nonce = $_POST["payment_method_nonce"];

error_log("nonce is: " . $nonce);   

$result = Braintree_Transaction::sale([
  'amount' => '777.00',
  'paymentMethodNonce' => $nonce,
  'options' => [
    'submitForSettlement' => True
  ]
]);

// $ldap = "ldap://localhost:8888";
// $ds = ldap_connect($ldap, 389);  
// // ldap_connect("ldap://host.domain", 389)
// $ldapbind = false;
   
// if(ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {
//   if(ldap_set_option($ds, LDAP_OPT_REFERRALS, 0))  {
//      if(ldap_start_tls($ds)) {
// 		// error_log("Client Token is: " . $clientToken);
// 		error_log("TLS Successful!", 0);
//      }
//   }
// }

// ldap_close($ds);



?>