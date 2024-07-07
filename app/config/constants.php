<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'support@dailygrill.store',
        'password' => 'M$etwtjVpnV7',
        'host'     => 'dailygrill.store',
        'name'     => 'dailygrill',
        'replyTo'  => 'support@dailygrill.store',
        'replyToName' => 'support@dailygrill.store'
    ];



    const ITEXMO = [
        'key' => '',
        'pwd' => ''
    ];

	#################################################
	##             SYSTEM CONFIG                ##g
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');

    define('SITE_NAME' , 'dailygrill.com');

    define('COMPANY_NAME' , 'Daily Grill');

    define('COMPANY_NAME_ABBR', 'Daily Grill');
    define('COMPANY_EMAIL', 'support@dailygrill.store');
    define('COMPANY_TEL', '+');
    define('COMPANY_ADDRESS', ' ');

    

    define('KEY_WORDS' , 'Daily Grill,Ordering System');
    define('DESCRIPTION' , '#############');
    define('AUTHOR' , 'Daily Grill Ordering System');
    define('APP_KEY' , 'Daily Grill-5175140471');
    

    const COMPANY_LINES = [
        'LINEA' => 'unparalleled dining experience',
        'LINEB' => 'First and Largest Unlimited
            Charcoal Grill establishment in the heart of the city',
        'LINEC' => 'wide-ranging and indulgent culinary journey that transcends the ordinary',
        'WELCOME' => "Welcome to Tondo's premier destination for an unparalleled dining experience - the First and Largest Unlimited
            Charcoal Grill establishment in the heart of the city. We take immense pride in presenting our esteemed customers
            with a wide-ranging and indulgent culinary journey that transcends the ordinary.",
        'SUB_TITLE' => 'Welcome to Daily Grill Unlimited Charcoal & Steak!'
    ];
?>