<?php

use Modules\Boilerplate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app(Router::class);

$api->version('v1', [
        'prefix' => 'api',
        'middleware' => ['api'],
        'namespace' => 'Modules\MailParser\Http\Controllers',
        'domain' => config('crmomni.settings.domain')
    ], function (Router $api) {

    // Unauthenticated Endpoints for Mail Parser
    $api->group(['prefix' => 'mailparser', 'middleware' => ['guest']], function(Router $api) {

        // Exotel Endpoints
        $api->group(['prefix' => 'exotel'], function(Router $api) {
            //Exotels Calls
            $api->any('callback','Exotel\\VoiceController@callback');
            $api->any('passthru','Exotel\\VoiceController@passthru');

            //Exotels SMS
            //$api->any('sms/callback','Exotel\\SmsController@callback');

            //TODO: Delete this
            $api->any('call/customer','Exotel\\VoiceController@test');
        });
    });
});