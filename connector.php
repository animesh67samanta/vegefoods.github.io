<?php

    //start session on web page

    // session_start();

    // config.php

    //Include Google Client Library for PHP autoload file
    require_once 'vendor/autoload.php';

    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('822448216416-e0j8e5gpkseuu4lspcvn3lidptuuov3d.apps.googleusercontent.com');

    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('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');

    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('http://localhost/vegefoods/index.php');

    // to get the email and profile 
    $google_client->addScope('email');

    $google_client->addScope('profile');



    //Facebook login
    // $facebook = new \Facebook\Facebook([
    //     'app_id' => '772123453923277',
    //     'app_secret' => '7e1f7fe1ebe89e67930346732d549c9b',
    //     'deault_graph_version' => 'v2.10',
    // ]);

?> 