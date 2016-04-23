<?php

class Paypal 
{
	/**
	 * Get the access token from Paypal
	 *
	 * @return string $accessToken
	 */
	public function getAccessToken() {
		// #1.
		$requestArray = array(
			'intent' => 'sale',
			'payer' => array(
				'payment_method' => 'credit_card',
				'funding_instruments' => array(
        			'credit_card' => array(
        				array(
          					'number' => '4417119669820331',
          					'type'=>'visa',
          					'expire_month'=>11,
          					'expire_year'=>2018,
          					'cvv2'=>'874',
          					'first_name'=>'Betsy',
          					'last_name'=>'Buyer',
          					'billing_address' => array(
            					'line1' => '111 First Street',
            					'city'=>'Saratoga',
            					'state'=>'CA',
            					'postal_code'=>'95070',
            					'country_code'=>'US'
          					)
						)
					)
				)
			),
			'transactions' => array(
				array(
					'amount' => array(
        				'total' => '7.47',
        				'currency' => 'USD',
        				'details' => array(
          					'subtotal' => '7.41',
					        'tax' => '0.03',
					        'shipping' => '0.03'
        				)
      				),
      				'description' => 'This is the payment transaction description.'
				)
			)
		);

	// #2.
	$curlHandler = curl_init();
	curl_setopt($curlHandler, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
	curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
		'Accept:application/json', 
		'Accept-Language: en_US',
		));
	curl_setopt($curlHandler, CURLOPT_USERPWD, 'Aep0J5tIKzbtAbF8mnifYf7e2yKQtrb8FQu41yk0jrSRaiR_hhUgSjUVvs9Pb2Cx0vUOJSa6Phh5lcYD:EE-m6m7FGwbJD3wv3i-ZI4DMx1bGh-n50FSAn7YX9k_hVpRdtUVhQhhiReBEhyGlugd2MmhC_tFekuyX');
	curl_setopt($curlHandler, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

	$accessToken = curl_exec($curlHandler);
	curl_close($curlHandler);
	
	// #3.
	print_r($accessToken);
	}
}



$paypalObject = new Paypal;
$paypalObject->getAccessToken();