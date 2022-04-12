<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    //
    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);

    }

    public function notifica()
    {
        $text = '
        Hola mundo
        <a href="'.route("todo").'" style="background-color: red; padding: 5px;">aceptar</a>
        ';

        Telegram::sendMessage([
            'chat_id' => config('telegram.bots.mybot.channel'),
            'parse_mode' => 'HTML',
            'text' => $text,
        ]);


    }
}
