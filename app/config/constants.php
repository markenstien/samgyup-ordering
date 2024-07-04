<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'cx@hotplate.one',
        'password' => 'zK9!0*#IDO7z',
        'host'     => 'hotplate.one',
        'name'     => 'Hotplate',
        'replyTo'  => 'cx@hotplate.one',
        'replyToName' => 'Hotplate'
    ];



    const ITEXMO = [
        'key' => '',
        'pwd' => ''
    ];

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');

    define('SITE_NAME' , 'dailygrill.com');

    define('COMPANY_NAME' , 'Daily Grill');

    define('COMPANY_NAME_ABBR', 'Daily Grill');
    define('COMPANY_EMAIL', 'main@hotplate.store');
    define('COMPANY_TEL', '+');
    define('COMPANY_ADDRESS', ' ');

    

    define('KEY_WORDS' , 'Daily Grill,Ordering System');

    define('DESCRIPTION' , '#############');
    define('AUTHOR' , 'Daily Grill Ordering System');
    define('APP_KEY' , 'Daily Grill-5175140471');
    
?>