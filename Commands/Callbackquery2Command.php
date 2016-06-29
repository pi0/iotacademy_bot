<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Request;

/**
 * Callback query command
 */
class Callbackquery2Command extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'callbackquery';
    protected $description = 'Reply to callback query';
    protected $version = '1.0.0';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        global $courses;

        $update = $this->getUpdate();
        $callback_query = $update->getCallbackQuery();
        $callback_data = $callback_query->getData();

        //$callback_query_id = $callback_query->getId();
        //$data['callback_query_id'] = $callback_query_id;

        $data = [];
        $data['chat_id'] ='70318509';

        $data['text'] = 'یافت نشد!';

//        $c = @$courses[intval($callback_data)];
//        if ($c != null) {
//            $data['text'] .= "\r\n" . $c['title'] . "\r\n" . $c['desc'] . "\r\n" . "قیمت: " . $c['price'];
//            $data['text'] .= "\r\n" . $c['url'];
//        } else {
//            $data['text'] = 'یافت نشد!';
//        }

        return Request::sendMessage($data);
    }
}
