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
 * User "/echo" command
 */
class EchoCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'main';
    protected $description = 'فرستادن اطلاعات صفحه اصلی';
    protected $usage = '/main';
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

        $text='فناوری اینترنت اشیاء نقش بسیار مهمی در دنیای کارآفرینی بازی میکند. کسب و کارهای متعددی بر محور این فناوری درحال راه اندازی هستند، درحالیکه این فناوری در ابتدای راه خود قرار دارد و هروز بیش از پیش تغییرات و تحولات جدیدی درآن رخ می دهد. استفاده از این فناوری برای کارآفرینان و محققین خلاق ایرانی یک فرصت گرانبها به شمار می رود که می تواند به بهبود فضای کسب و کار و اشتغال زایی در کشور کمک شایانی بکند.';


        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data);
    }
}
