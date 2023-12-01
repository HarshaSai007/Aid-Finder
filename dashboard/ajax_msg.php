<?php
include 'connect.php';

require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

$account_sid = 'AC60df12d0cc71a3ea9f4e01fa0a666a47';
$auth_token = '9b8da26cdc70e2dd6516529c4eeaa56f';


$twilio = new Client($account_sid, $auth_token);
$toNumber = '+91' . $_POST['toNumber'];
$name = $_POST['name1'];

try {

    $message = $twilio->messages->create(
        $toNumber,
        array(
            'from' => '+1 475 255 2697',
            'body' => 'hello This is From ' . $name . 'okk',
        )
    );
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
