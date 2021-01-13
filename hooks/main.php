//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}
use WebSocket\Client;
class rconrust_hook_main extends _HOOK_CLASS_
{

public function onPurchaseGenerated( \IPS\nexus\Purchase $purchase, \IPS\nexus\Invoice $invoice )
    {
	try
	{
	  			$ip = \IPS\Settings::i()->rust_ip;
	  			$rcon_port = \IPS\Settings::i()->rust_port; 	 
	     		$rcon_pass = \IPS\Settings::i()->rust_password; 
	            $client = new Client("ws://{$ip}:{$rcon_port}/{$rcon_pass}");

     			
      
      			if ( \IPS\Settings::i()->rust_product_1_steamID == 1  or \IPS\Settings::i()->rust_product_2_steamID == 1 or \IPS\Settings::i()->rust_product_3_steamID == 1 or \IPS\Settings::i()->rust_product_4_steamID == 1)
               		{
                 	 $memberID = $purchase->member->steamid;
                	}
      			else
                	{
                  	$memberID = '';
               		}
      		
	   // if ( in_array( $this->id, array( 1, 2, 3, 4, 5 ) ) )
 
           if ( \IPS\Settings::i()->rust_product_1_on == 1 AND  \in_array( $this->id, explode( ',', \IPS\Settings::i()->rust_product_1_products )) )
		    {

	           $prod1_com = \IPS\Settings::i()->rust_product_1_comamnd;
      		   $prod1_arg = \IPS\Settings::i()->rust_product_1_arguments;
	 
	
	            $data = array(
	                'Identifier' => 0,
					'Message' => "$prod1_com $memberID $prod1_arg",
	                'Stacktrace' => '',
	                'Type' => 3
	            );
	            $client->send(json_encode($data));
	            $result = json_decode($client->receive());
	        
			}
      
        if ( \IPS\Settings::i()->rust_product_2_on == 1 AND  \in_array( $this->id, explode( ',', \IPS\Settings::i()->rust_product_2_products )) )
		    {

	           $prod2_com = \IPS\Settings::i()->rust_product_2_comamnd;
      		   $prod2_arg = \IPS\Settings::i()->rust_product_2_arguments;
	 
	
	            $data = array(
	                'Identifier' => 0,
					'Message' => "$prod2_com $memberID $prod2_arg",
	                'Stacktrace' => '',
	                'Type' => 3
	            );
	            $client->send(json_encode($data));
	            $result = json_decode($client->receive());
	        
			}
      	 if ( \IPS\Settings::i()->rust_product_3_on == 1 AND  \in_array( $this->id, explode( ',', \IPS\Settings::i()->rust_product_3_products )) )
		    {

	           $prod3_com = \IPS\Settings::i()->rust_product_3_comamnd;
      		   $prod3_arg = \IPS\Settings::i()->rust_product_3_arguments;
	 
	
	            $data = array(
	                'Identifier' => 0,
					'Message' => "$prod3_com $memberID $prod3_arg",
	                'Stacktrace' => '',
	                'Type' => 3
	            );
	            $client->send(json_encode($data));
	            $result = json_decode($client->receive());
	        
			}
       if ( \IPS\Settings::i()->rust_product_4_on == 1 AND  \in_array( $this->id, explode( ',', \IPS\Settings::i()->rust_product_4_products )) )
		    {

	           $prod4_com = \IPS\Settings::i()->rust_product_4_comamnd;
      		   $prod4_arg = \IPS\Settings::i()->rust_product_4_arguments;
	 
	
	            $data = array(
	                'Identifier' => 0,
					'Message' => "$prod4_com $memberID $prod4_arg",
	                'Stacktrace' => '',
	                'Type' => 3
	            );
	            $client->send(json_encode($data));
	            $result = json_decode($client->receive());
	        
			}
			
			return parent::onPurchaseGenerated( $purchase, $invoice );
	  
	}
	catch ( \RuntimeException $e )
	{
		if ( method_exists( get_parent_class(), __FUNCTION__ ) )
		{
			return \call_user_func_array( 'parent::' . __FUNCTION__, \func_get_args() );
		}
		else
		{
			throw $e;
		}
	}
    }
  


}
