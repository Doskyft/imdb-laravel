<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class GenerateApiKey
{
    public function handle($event): void
    {
        // Générer une clé API unique
        $apiKey = Str::random(40); // Vous pouvez ajuster la longueur selon vos besoins

        // Assigner la clé API générée au modèle User
        $event->user->api_key = $apiKey;
    }
}
