<?php

use App\Http\Controllers\OauthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::name("dashboard.")->prefix("dashboard")->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::name("accounts.")->prefix("accounts")->group(function () {
        Route::get('/', 'LinkedAccountsController@index')->name('account');
        Route::get('/discord', 'LinkedAccountsController@formulaire_discord')->name('discord');
        Route::get('/discord/callback', 'DiscordController@handleDiscordCallback');
    });

    Route::get('/discord', 'DiscordController@index')->name('discord');

    Route::get('/chats', 'ChatController@index')->name('chats');

    Route::get('/widgets', 'WidgetController@index')->name('widgets');
    
    Route::name("oauth.")->prefix("oauth")->group(function () {
        Route::get("/", [OauthController::class , "index"])->name("index");
        Route::post("/", [OauthController::class, "addService"])->name("add-service");
        Route::delete("/{service}", [OauthController::class, "deleteOauth"])->name("delete-oauth");
    });
});

Route::name("oauth.")->prefix("oauth")->middleware("auth")->group(function () {
    Route::name("callback.")->prefix("callback")->group(function () {
        Route::get("twitch", [OauthController::class, "twitchCallback"])->name("twitch");
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');
