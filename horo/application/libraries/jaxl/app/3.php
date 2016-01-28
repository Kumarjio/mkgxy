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
		'port'=>5222,
		'boshHost'=>SERVER,
        'authType'=>'PLAIN',
        'logLevel'=>4
    ));

    // Register callback on required hooks
	function thisistestfunction($payload, $jaxl)
	{
		echo 'start';
		pr($jaxl->payloadRaw);
		echo 'end';
	}
	function testx($payload, $jaxl) {
		$jaxl->requires('JAXL0060');
		$jaxl->JAXL0060('getNodeItems', 'pubsub.64.22.114.70', 'user3@64.22.114.70', 'test1223', 'thisistestfunction');
	}
    $jaxl->addPlugin('jaxl_post_auth', 'testx');
    $jaxl->startCore("stream");


?>
