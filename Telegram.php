<?php

class Telegram extends Longman\TelegramBot\Telegram {

    protected $version='1.0.0';


    public function __construct($api_key, $bot_name)
    {
        parent::__construct($api_key, $bot_name);
        $this->commands_paths=[];
    }

}

