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
            $c = null;
            foreach ($courses as $id => $course) {
                if ($course['title'] == $text) {
                    $c = $course;
                    break;
                }
            }
            if ($c != null) {
                $data['text'] .= "\r\n" . $c['title'] . "\r\n" . $c['desc'] . "\r\n" . "قیمت: " . $c['price'];
                $data['text'] .= "\r\n" . $c['url'];
            }

        }

        //
        $k = [];
        foreach ($courses as $id => $course) {
            //$k[] = '/courses '.$course['title'];
            $k[] = [new InlineKeyboardButton(['text' => $course['title'], 'callback_data' => '' . $id])];
        }

//        $data['reply_markup'] = new ReplyKeyboardMarkup(
//            [
//                'keyboard' => [$k],
//                'resize_keyboard' => true,
//                'one_time_keyboard' => true,
//                'selective' => true,
//            ]
//        );

        $data['reply_markup'] = new InlineKeyboardMarkup(['inline_keyboard' => $k]);

        return Request::sendMessage($data);
    }
}
