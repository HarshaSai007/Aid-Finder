<?php
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

$account_sid = 'AC60df12d0cc71a3ea9f4e01fa0a666a47';
$auth_token = '9b8da26cdc70e2dd6516529c4eeaa56f';

$twilio = new Client($account_sid, $auth_token);

if ($twilio) {
    $calls = $twilio->calls->read();

    foreach ($calls as $call) {
        $from = $call->from;
        $to = $call->to;
        $dateCreated = $call->dateCreated->format('Y-m-d H:i:s');
    }
} else {
    echo "Failed to initialize Twilio client.";
}
    