<?php
require_once '../init.php';

// Create Telegram API object
$telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

// Unset webhook
$result = $telegram->unsetWebHook();

if ($result->isOk()) {
    echo $result->getDescription();
}