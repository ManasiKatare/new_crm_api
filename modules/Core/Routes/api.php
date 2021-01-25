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
        'namespace' => 'Modules\Core\Http\Controllers',
        'domain' => config('crmomni.settings.domain')
    ], function (Router $api) {

    // Unauthenticated OR Guest endpoints
    $api->group(['middleware' => ['guest']], function(Router $api) {
        // Organization Endpoint
        $api->group(['prefix' => 'organization'], function(Router $api) {
        });
    });

    // Authenticated Endpoints for Backend
    $api->group(['middleware' => ['auth:backend']], function(Router $api) {
        // Organization Endpoint
        $api->group(['prefix' => 'organization'], function(Router $api) {
            $api->post('/', 'Backend\\OrganizationController@create');
            $api->get('{organization}', 'Backend\\OrganizationController@update');

            $api->get('/', 'Backend\\OrganizationController@index');
            $api->get('{organization}', 'Backend\\OrganizationController@show');
        });

        // Lookup Endpoint
        $api->group(['prefix' => 'lookup'], function(Router $api) {
            $api->get('/', 'Backend\\LookupController@index');
            $api->get('{key}', 'Backend\\LookupController@show');

            $api->post('/', 'Backend\\LookupController@create');
            $api->put('{key}', 'Backend\\LookupController@update');
            $api->delete('{key}', 'Backend\\LookupController@destroy');
        });

        // Role Endpoint
        $api->group(['prefix' => 'role'], function(Router $api) {
            $api->get('/', 'Backend\\RoleController@index');
            $api->get('{key}', 'Backend\\RoleController@show');

            $api->post('/', 'Backend\\RoleController@create');
            $api->put('{key}', 'Backend\\RoleController@update');
            $api->delete('{key}', 'Backend\\RoleController@destroy');
        });
    });
});