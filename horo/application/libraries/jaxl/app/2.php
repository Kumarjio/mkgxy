<?php

    /**
     * Sample command line bot for sending a message
     * Usage: cd /path/to/jaxl
     * 	      Edit username/password below
     * 		  Run from command line: /path/to/php sendMessage.php "username@gmail.com" "Your message"
     * 		  View jaxl.log for detail
     * 
     * Read More: http://jaxl.net/examples/sendMessage.php
    */

	// Initialize Jaxl Library
    require_once '../core/jaxl.class.php';
    require_once '../core/func.php';
	
    // Values passed to the constructor can also be defined as constants
    // List of constants can be found inside "../../env/jaxl.ini"
    // Note: Values passed to the constructor always overwrite defined constants
    $jaxl = new JAXL(array(
        'user'=>'user3',
        'pass'=>'password',
        'host'=>SERVER,
        'domain'=>SERVER,
        'authType'=>'PLAIN',
        'logLevel'=>4
    ));
	// Post successful auth send desired message
    function postAuth($payload, $jaxl) {
        global $argv;
        $jaxl->sendMessage($argv[1], $argv[2]);
        $jaxl->shutdown();
    }

    // Register callback on required hooks
	function thisistestfunction($payload, $jaxl)
	{
		pr($payload);
	}
	function testx($payload, $jaxl) {
		$jaxl->requires('JAXL0060');
		$item = "<x xmlns='jabber:x:data' type='result'>
<field var='title'>
<value>A History of Pemberley2</value>
</field>
<field var='author'>
<value>Sir Lewis de Bourgh2</value>
</field>
</x>";
		$jaxl->JAXL0060('publishItem', 'pubsub.64.22.114.70', 'user3@64.22.114.70', 'test1223', $item, FALSE, 'thisistestfunction');
	}

    $jaxl->addPlugin('jaxl_post_auth', 'testx');
    $jaxl->startCore("stream");
	


?>
