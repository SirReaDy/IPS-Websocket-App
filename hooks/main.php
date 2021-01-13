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
		
  
         if ( \IPS\Settings::i()->enable_discord == 1) {
      
 				$discord_id = \IPS\Settings::i()->discord_id;
      			$discord_hook = \IPS\Settings::i()->discord_hook;
      			$url = "https://discord.com/api/webhooks/{$discord_id}/{$discord_hook}";
    			
	  			$timestamp = date("c", strtotime("now"));
      		
				$botusername  = \IPS\Settings::i()->botusername; 
      			$discord_title  = \IPS\Settings::i()->discord_title;  
     			$description  = \IPS\Settings::i()->description;  
      			$color  = \IPS\Settings::i()->discord_color;  
            	$author_name  = \IPS\Settings::i()->discord_author_name;  
            	$author_url  = \IPS\Settings::i()->discord_author_url;  
    			$purchaseItem = $purchase->name;
            	$member = $purchase->member->steamid;
           
           		$field_1_name = \IPS\Settings::i()->discord_field_1_name;  
                $field_1_value = \IPS\Settings::i()->discord_field_1_value;
                $field_2_name = \IPS\Settings::i()->discord_field_2_name;  
                $field_2_value = \IPS\Settings::i()->discord_field_2_value; 
                $field_3_name = \IPS\Settings::i()->discord_field_3_name;  
                $field_3_value = \IPS\Settings::i()->discord_field_3_value; 
      

$hookObject = json_encode([

    "username" => "$botusername",
    "tts" => false,
    "embeds" => [

        [
           
            "title" => "$discord_title",
            "type" => "rich",
            "description" => "$member $description $purchaseItem",
            "timestamp" => "$timestamp",
            "color" => hexdec( "$color" ),
            "author" => [
                "name" => "$author_name",
                "url" => "$author_url"
            ],
          
		
		"fields" => [
         
                [
                    "name" => "$field_1_name",
                    "value" => "$field_1_value",
                    "inline" => true
                ],
          
          
                [
                    "name" => "$field_2_name",
                    "value" => "$field_2_value",
                    "inline" => true
                ],
        
         
                [
                    "name" => "$field_3_name",
                    "value" => "$field_3_value",
                    "inline" => true
                ]
      
            ]
       
    
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );
curl_close( $ch );  
      
      
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
