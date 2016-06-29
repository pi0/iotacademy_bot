<?php
require_once '../init.php';


// Create Telegram API object
$telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

// Set Webhook
$result = $telegram->setWebHook($hook_url);

// Uncomment to use certificate
//$result = $telegram->setWebHook($hook_url, $path_certificate);

if ($result->isOk()) {
    echo $result->getDescription();
}