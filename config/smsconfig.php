<?php


return [

    // HTTP METHOD (get/post)
    // 'method' => 'get', (Currently GET supported)

    //SMS URL (FOR SENDING SMS)
    'sms_url' => 'http://www.alots.in/sms-panel/api/http/index.php',
    'sms_params' => [
        'username' => 'API_USER_NAME',
        'apikey' => 'API_KEY_OR_PASSWORD',
        'ANY_QUERY' => 'ANY_QUERY',
        'route' => 'TRANS',
        'format' => 'JSON,TEXT',
        'senderID' => 'VENDIM',
        'CUSTOM_FIELD_1' => 'ANY_INFO',
        'CUSTOM_FIELD_2' => 'ANY_INFO',
        'CUSTOM_FIELD_3' => 'ANY_INFO',
    ],

    //BALANCE CHECK URL (FOR SENDING SMS)
    'balance_url' => 'http://www.alots.in/sms-panel/api/http/index.php',
    'balance_params' => [
        'username' => 'API_USER_NAME',
        'apikey' => 'API_KEY_OR_PASSWORD',
        'ANY_QUERY' => 'ANY_QUERY',
        'route' => 'TRANS',
        'format' => 'JSON,TEXT',
    ],


];