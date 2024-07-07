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
    define('COMPANY_EMAIL', 'dailygrill01@gmail.com');
    define('COMPANY_TEL', '(02)88138828');
    define('COMPANY_ADDRESS', '603 Nicolas Zamora St Tondo Manila Cor. Perla');

    

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