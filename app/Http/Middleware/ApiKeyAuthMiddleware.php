<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiKeyAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Validez la présence de la clé API dans la requête
        if (!$apiKey = $request->header('Authorization')) {
            return response()->json(['message' => 'Clé API manquante'], 401);
        }

        // Recherchez l'utilisateur en fonction de la clé API
        $user = User::where('api_key', $apiKey)->first();

        if (!$user) {
            // L'utilisateur avec cette clé API n'existe pas
            return response()->json(['message' => 'Clé API invalide'], 401);
        }

        // Authentification de l'utilisateur
        Auth::login($user);

        return $next($request);
    }
}
