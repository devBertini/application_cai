<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

$router->get('/', function () use ($router) {
    return response()->json(['message' => 'Rota de Teste', 'details' => 'A aplicação está online!'], 200);
});


// Rotas para Profissionais
Route::apiResource('professionals', ProfessionalController::class);

// Rotas para Patients
Route::apiResource('patients', PatientController::class);

// Rotas para Schedulings
Route::apiResource('schedulings', SchedulingController::class);

// Rotas para Users
Route::apiResource('users', UserController::class);