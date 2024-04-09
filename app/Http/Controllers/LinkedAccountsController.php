<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkedAccountsController extends Controller
{
    public function index()
    {
        return view('linked-accounts');
    }

    public function formulaire_discord()
    {

        // URL d'autorisation OAuth2 de Discord
        $discordAuthorizationUrl = 'https://discord.com/api/oauth2/authorize?' . http_build_query([
            'client_id' => '1227235894453342250', // Votre ID de client Discord
            'redirect_uri' => url()->previous(), // Votre URI de redirection après autorisation
            'response_type' => 'code', // Le type de réponse attendu (dans ce cas, un code d'autorisation)
            'scope' => 'identify' // Les scopes que vous demandez pour votre application
        ]);

        return redirect()->away($discordAuthorizationUrl);
    }
}
