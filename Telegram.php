<?php

class Telegram extends Longman\TelegramBot\Telegram
{

    protected $version = '1.0.0';


    public function addCommandsPath($path, $before = true)
    {
        if ($path != BASE_COMMANDS_PATH . '/UserCommands')
            parent::addCommandsPath($path, $before);
    }

    public function getCommandObject($command)
    {
        if ($command == 'start')
            $command = 'start2';
        else if ($command == 'Callbackquery')
            $command = 'callbackquery2';

        return parent::getCommandObject($command);
    }



}

