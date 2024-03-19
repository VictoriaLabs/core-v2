<?php

namespace App\Http\Controllers;

use App\Models\OauthService;
use Illuminate\Http\Request;

class OauthController extends Controller
{
    public function index()
    {
        return view("settings.oauth.index", [
            "services" => OauthService::where("enabled", true)->get()
        ]);
    }

    public function addService(Request $request)
    {
        $request->validate([
            "service" => "exists:App\Models\OauthService,id"
        ]);

        $service = OauthService::find($request->service);
    }
}
