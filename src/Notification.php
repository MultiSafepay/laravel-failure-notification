<?php

declare(strict_types=1);

namespace NotificationFailure;

use NotificationFailure\Model;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification as BaseNotification;

class Notification extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private Model $failure)
    {
        //
    }

    public function via(): mixed
    {
        return config('notification_failure', ['database']);
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return $this->failure->toArray();
    }
}
