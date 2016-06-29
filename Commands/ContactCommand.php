<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

/**
 * User "/about" command
 */
class ContactCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'contact';
    protected $description = 'ارتباط با ما';
    protected $usage = '/contact';
    protected $version = '1.0.0';

    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        //$text = trim($message->getText(true));

        $text='برای ارتباط با ما به این صفحه مراجعه فرمایید http://www.iotacademy.ir/contact/';

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];


        return Request::sendMessage($data);
    }
}
