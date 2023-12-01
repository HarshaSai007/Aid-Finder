<?php

require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

$account_sid = 'AC60df12d0cc71a3ea9f4e01fa0a666a47';
$auth_token = '9b8da26cdc70e2dd6516529c4eeaa56f';


$twilio = new Client($account_sid, $auth_token);
$toNumber = '+91' . $_POST['toNumber'];
$a_name = isset($_POST['name1']) ? $_POST['name1'] : null;

try {

    $call = $twilio->calls->create(
        $toNumber,
        '+1 475 255 2697',
        [
            "twiml" => "<Response><Say>Hello, this from" . $a_name . " disaster annocement on this village be safe</Say></Response>"
        ]
    );
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
