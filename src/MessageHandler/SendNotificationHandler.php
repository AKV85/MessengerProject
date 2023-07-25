<?php

namespace App\MessageHandler;

use App\Message\SendNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SendNotificationHandler
{
    public function __invoke(SendNotification $notification)
    {
        sleep(10);
        foreach ($notification->getRecipients() as $recipient)
        dump(sprintf('Your email "%s" have message : "[%s]"', $recipient, $notification->getMessage()));

    }
}