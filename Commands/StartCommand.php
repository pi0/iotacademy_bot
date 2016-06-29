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
use Longman\TelegramBot\Entities\InlineKeyboardMarkup;
use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;
use Longman\TelegramBot\Request;

/**
 * User "/start" command
 */
class startCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'start';
    protected $description = 'شروع کار با روبات';
    protected $usage = '/start';
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

        $data['text'] = 'برای شروع کار از یکی از گزینه های موجود استفاده نمایید';

        $data['reply_markup'] = new InlineKeyboardMarkup(
            [
                'inline_keyboard' => ['/start', '/about', '/contact', '/main'],
            ]
        );

        return Request::sendMessage($data);
    }
}
