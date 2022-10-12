<?php

namespace App\Notifications\Messages;

class LINEMessage
{
    private array $messages;

    public function text(string $text): static
    {
        $this->messages[] = [
            'type' => 'text',
            'text' => $text,
        ];

        return $this;
    }

    public function sticker(int $packageId, int $stickerId): static
    {
        $this->messages[] = [
            'type' => 'sticker',
            'packageId' => $packageId,
            'stickerId' => $stickerId,
        ];

        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }
}
