<?php

return function (CM_Config_Node $config) {
    $config->dayOffset = 6;

    $config->Denkmal_Http_Response_Api_Message->hashToken = 'denkmal.dev';
    $config->Denkmal_Http_Response_Api_Message->hashAlgorithm = 'sha1';

    $config->Denkmal_Scraper_Manager->dayCount = 10;
    $config->Denkmal_Scraper_Date->defaultTimeHour = 22;

    $config->CM_App->setupScriptClasses[] = 'Denkmal_App_SetupScript_LoadLanguage';

    $config->CM_Stream_Video->servers = array();

    $config->services['twitter'] = array(
        'class'     => 'Denkmal_Twitter_Client',
        'arguments' => array(array(
            'consumer_key'       => '<consumer-key>',
            'consumer_secret'    => '<consumer-secret>',
            'oauth_token'        => '<oauth-token>',
            'oauth_token_secret' => '<oauth-token-secret>',
        )),
    );
};
