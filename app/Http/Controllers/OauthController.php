<?php

namespace App\Http\Controllers;

use App\Models\SessionCookie;
use Illuminate\Http\Request;
use App\Models\Oauth;
use App\Models\OauthService;


class OauthController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('oauth');
    }

    public function redirectToGoogleProvider()
    {
        // Create the oauth_services_id in the table 'oauth_services'
        $oauthService = new OauthService();
        $oauthService->name = 'Google';
        $oauthService->save();

        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT'));
        $client->addScope('https://www.googleapis.com/auth/youtube');

        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    public function handleGoogleProviderCallback()
    {
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT'));

        if (request()->get('code')) {
            $token = $client->fetchAccessTokenWithAuthCode(request()->get('code'));
//            dd($token);

            // Récupérer l'utilisateur actuel
            $user = auth()->user();

            // Créer un nouvel enregistrement dans la table 'oauth'
            $oauth = new Oauth();
            $oauth->user_id = $user->id;
            $oauth->oauth_services_id = 1;
            $oauth->refresh_token = null;
            $oauth->access_token = $token['access_token'];
            $oauth->token_type = $token['token_type'];
            $oauth->expired_at = date("Y-m-d H:i:s", time() + $token['expires_in']);

            // Vérifier si 'refresh_token' existe dans le tableau $token
            if (isset($token['refresh_token'])) {
                $oauth->refresh_token = $token['refresh_token'];
            }

            $saved = $oauth->save();

            return redirect('/dashboard/oauth')->with('success', 'Authentification réussie avec YouTube.');
        } else {
            return redirect('/dashboard/oauth')->with('error', 'Échec de l\'authentification avec YouTube.');
        }
    }
}
