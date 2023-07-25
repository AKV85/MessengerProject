<?php

namespace App\Message;

class SendNotification
{
    private string $message;

    private array $recipients;

    public function __construct(string $message, array $recipients = [])
    {

        $this->message = $message;
        $this->recipients = $recipients;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getRecipients(): array
    {
        return $this->recipients;
    }
}

