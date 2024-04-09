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
            'redirect_uri' => '/dashboard/accounts/discord/callback', // Votre URI de redirection après autorisation
            'response_type' => 'code', // Le type de réponse attendu (dans ce cas, un code d'autorisation)
            'scope' => 'identify' // Les scopes que vous demandez pour votre application
        ]);

        return redirect()->away($discordAuthorizationUrl);
    }

    public function handleDiscordCallback(Request $request)
    {
        // Vérifier si le code d'autorisation est présent dans la requête
        if ($request->has('code')) {
            // Récupérer le code d'autorisation de la requête
            $authorizationCode = $request->input('code');

            $http = new Client();

            $response = $http->post('https://discord.com/api/oauth2/token', [
                'form_params' => [
                    'client_id' => 'VOTRE_CLIENT_ID',
                    'client_secret' => 'VOTRE_CLIENT_SECRET',
                    'grant_type' => 'authorization_code',
                    'code' => $authorizationCode,
                    'redirect_uri' => 'VOTRE_URI_DE_RETOUR',
                    'scope' => 'identify'
                ]
            ]);

            $tokenResponse = json_decode($response->getBody()->getContents(), true)['access_token'];



            return redirect()->away('/dashboard/accounts');
        } else {
            return http_response_code(400);
        }
    }
}
