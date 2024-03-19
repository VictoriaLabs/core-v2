<?php

namespace App\Http\Controllers;

use App\Models\Oauth;
use App\Models\OauthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OauthController extends Controller
{
    public function index()
    {
        return view("settings.oauth.index", [
            "services" => OauthService::where("enabled", true)->get(),
            "oauths" => Auth::user()->Oauth,
        ]);
    }

    public function addService(Request $request)
    {
        $request->validate([
            "service" => "exists:App\Models\OauthService,id"
        ]);

        $service = OauthService::find($request->service);

        return redirect()->to($service->btn_url);
    }

    public function deleteOauth(Oauth $oauth)
    {
        $oauth->delete();

        return redirect()->back()->with("success", "Oauth deleted !");
    }

    public function twitchCallback(Request $request)
    {
        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => config("oauth.twitch.client_id"),
            'client_secret' => config("oauth.twitch.client_secrete"),
            "code" => $request->code,
            "grant_type" => "authorization_code",
            "redirect_uri" => route("oauth.callback.twitch")
        ]);

        if ($response->successful()) {
            $data = $response->json();

            Oauth::create([
                "user_id" => Auth::user()->id,
                "oauth_service_id" => 1,
                "access_token" => $data["access_token"],
                "token_type" => $data["token_type"],
                "expire_at" => now()->addSeconds($data["expires_in"]),
                "refresh_token" => $data["refresh_token"]
            ]);

            return redirect()->route("dashboard.oauth.index")->with("success", "Service added !");
        } else {
            return  redirect()->route("dashboard.oauth.index")->with("error", $response->body());
        }
    }
}


