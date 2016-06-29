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
        $update = $this->getUpdate();
        $callback_query = $update->getCallbackQuery();
        $callback_data = $callback_query->getData();
        //$callback_query_id = $callback_query->getId();
        //$data['callback_query_id'] = $callback_query_id;




        if ($callback_data == 'a') {
            $data['text'] = $callback_data;
            $data['show_alert'] = true;
        } else {
            $data['text'] = $callback_data;
            $data['show_alert'] = false;
        }

        return Request::answerCallbackQuery($data);
    }
}