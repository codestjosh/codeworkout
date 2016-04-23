<?php

class Paypal 
{
	/**
	 * Get the access token from Paypal
	 */
	public function getAccessToken() {
		$requestArray = array(
			'intent' => 'sale',
			'payer' => array(
				'payment_method' => 'credit_card',
				'funding_instruments' => array(
        			'credit_card' => array(
        				array(
          					'number' => '4417119669820331',
          					'type':'visa',
          					'expire_month':11,
          					'expire_year':2018,
          					'cvv2':'874',
          					'first_name':'Betsy',
          					'last_name':'Buyer',
          					'billing_address' => array(
            					'line1' => '111 First Street',
            					'city':'Saratoga',
            					'state':'CA',
            					'postal_code':'95070',
            					'country_code':'US'
          					)
						)
					)
				)
			)
		)
	}

}