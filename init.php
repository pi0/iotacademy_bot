<?php

// Load Composer
require __DIR__ . '/vendor/autoload.php';


$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$API_KEY = getenv('API_KEY');
$BOT_NAME = getenv('BOT_NAME');
$hook_url = getenv('HOOK_URL');
$PDO_DSN = 'sqlite:messaging.sqlite3';

//$commands_path = __DIR__ . '/Commands/';


// Create Telegram API object
$telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

// Enable MySQL
//$telegram->enableExternalMysql(new PDO($PDO_DSN));


//// Add an additional commands path
//$telegram->addCommandsPath($commands_path);

//// Here you can enable admin interface for the channel you want to manage
//$telegram->enableAdmins(['your_telegram_id']);
//$telegram->setCommandConfig('sendtochannel', ['your_channel' => '@type_here_your_channel']);

//// Here you can set some command specific parameters,
//// for example, google geocode/timezone api key for date command:
//$telegram->setCommandConfig('date', ['google_api_key' => 'your_google_api_key_here']);

//// Logging
//\Longman\TelegramBot\TelegramLog::initialize($your_external_monolog_instance);
//\Longman\TelegramBot\TelegramLog::initErrorLog($path . '/' . $BOT_NAME . '_error.log');
//\Longman\TelegramBot\TelegramLog::initDebugLog($path . '/' . $BOT_NAME . '_debug.log');
//\Longman\TelegramBot\TelegramLog::initUpdateLog($path . '/' . $BOT_NAME . '_update.log');

//// Set custom Upload and Download path
//$telegram->setDownloadPath('../Download');
//$telegram->setUploadPath('../Upload');

//// Botan.io integration
//$telegram->enableBotan('your_token');