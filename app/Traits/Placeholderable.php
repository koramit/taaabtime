<?php

namespace App\Traits;

trait Placeholderable
{
    private function replaceholders(string $text, array $placeholders): string
    {
        foreach ($placeholders as $search => $replace) {
            $text = str_replace(":$search:", $replace, $text);
        }

        return $text;
    }
}
