<?php

$config = array(
    'api' => array(
        'auth' => array(),
    ),
);

$config['api']['auth']['url_base'] = 'https://www.bondora.com';
$config['api']['auth']['client_id'] = getenv('BONDORA_CLIENT_ID');
$config['api']['auth']['secret'] = getenv('BONDORA_SECRET');
$config['api']['auth']['scope'] = 'BidsEdit BidsRead Investments SmBuy SmSell';
$config['api']['api_base'] = 'https://api.bondora.com';

$config['token'] = getenv('BONDORA_TOKEN');
