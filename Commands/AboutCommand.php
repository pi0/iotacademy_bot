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
class AboutCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'about';
    protected $description = 'درباره ما';
    protected $usage = '/about';
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

        $data['text']='در این بخش شما با مفاهیم اولیه و مورد نیاز برای شروع کار با اینترنت اشیاء آشنا خواهید شد. به این ترتیب میتوانید نخستین گام خورد را در این عرصه بردارید. ما شما را با مفاهیم کلی، پیش نیازهای لازمه و هرآنچه که برای دورۀ اصلی نیاز دارید آشنا خواهیم کرد تا در بخش پیشرفتۀ دوره ها احساس کمبود نکنید.';
        $data['text'] .= "\r\n" . 'http://www.iotacademy.ir';

        $data['reply_markup'] = new InlineKeyboardMarkup(['inline_keyboard' => [[
            new InlineKeyboardButton(['text' => 'درباره ما', 'url' => 'http://www.iotacademy.ir/about/']),
        ]]]);
        
        return Request::sendMessage($data);
    }
}
