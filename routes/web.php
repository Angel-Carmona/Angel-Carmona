<?php

use Illuminate\Support\Facades\Route;
/*
 | Define namespace controllers
 */
if (!defined('CONTROLLERS')) {
    define("CONTROLLERS", 'App\Http\Controllers\LoadControllers');
}
/*
 | Define list ROUTES
 */
if (!defined('ROUTES')) {
    define(
        "ROUTES",
        [
            [
              "name" => "ApiRest", # route
              "as" => "ApiRest", 
              "loadControllerName" => "ApiRest" # method
            ],
        ]
    );
}

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


/*
|--------------------------------------------------------------------------
| back index.php
|--------------------------------------------------------------------------
| http_response_code(403);
| forbidden
*/
Route::get('/', function () {
    http_response_code(403);
    die("forbidden");
});

/*
|--------------------------------------------------------------------------
| Application REST FULL
|--------------------------------------------------------------------------
| http_response_code(200);
| OK
*/
foreach (ROUTES as $route) {
    $route = (object) $route;
    Route::any(
        '/' . $route->name,
        [
            'as' => $route->as,
            'uses' => CONTROLLERS . '@' . $route->loadControllerName
        ]
    );
}
