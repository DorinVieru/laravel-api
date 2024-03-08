<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\TypeApiController;
use App\Http\Controllers\Api\LeadApiController;

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

// Route::get('/progetti', function () {
//     return 'welcome';
// });

Route::get('/projects', [ProjectApiController::class, 'index']);
Route::get('/projects/{slug}', [ProjectApiController::class, 'show']);
Route::get('/projects/type/{slug}', [ProjectApiController::class, 'projects_types']);

Route::get('/types', [TypeApiController::class, 'index']);

Route::post('/contacts', [LeadApiController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});