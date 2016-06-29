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
 * User "/courses" command
 */
class CoursesCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'courses';
    protected $description = 'دوره های آموزشی';
    protected $usage = '/courses';
    protected $version = '1.0.0';

    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        global $courses;
        $message = $this->getMessage();
        $data = [];
        $data['chat_id'] = $message->getChat()->getId();
        $text = trim($message->getText(true));

        $data['text'] = 'دوره های آموزشی';
        $data['text'] .= "\r\n" . 'http://www.iotacademy.ir/courses';

        if ($text == '') {
            $data['text'] = 'یک دوره را انتخاب نمایید:';
        } else {
            $data['text'] = 'دوره فلان';
            $data['text'] .= "\r\n" . $text;
        }

        //

        $k = [];

        foreach ($courses as $id => $course) {
            $k[] = new InlineKeyboardButton(['text' => $course['title'], 'callback_data' => 'a']);
        }

        $data['reply_markup'] = new InlineKeyboardMarkup(['inline_keyboard' => [$k]]);

        return Request::sendMessage($data);
    }
}
