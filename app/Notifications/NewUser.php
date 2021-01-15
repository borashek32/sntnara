<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Получен новый ответ на ваш комментарий на сайте СНТ НАРА')
                    ->action('Прочитать ответ можно по ссылке', url('/'))
                    ->line('Вместе сделаем наше товарищество лучше!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
