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
use Longman\TelegramBot\Entities\InlineKeyboardButton;
use Longman\TelegramBot\Entities\InlineKeyboardMarkup;
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
        $data = [];
        $data['chat_id'] = $message->getChat()->getId();

        $data['text'] = 'برای تماس با ما بر روی دکمه زیر کلیک کنید';

        $data['reply_markup'] = new InlineKeyboardMarkup(['inline_keyboard' => [[
            new InlineKeyboardButton(['text' => 'ارتباط با ما', 'url' => 'http://www.iotacademy.ir/contact/']),
        ]]]);


        return Request::sendMessage($data);
    }
}
