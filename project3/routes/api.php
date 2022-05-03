<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\User;

use function PHPUnit\Framework\returnSelf;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/book/add', [BookController::class, 'add']);
Route::get('/book/all', [BookController::class, 'all']);
Route::delete('/book/delete/{id}', [BookController::class, 'delete']);
Route::put('/book/change_availabilty/{id}', [BookController::class, 'changeAvailabilty']);

Route::post('/token', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if($user == null){
        return null;
    }

    // Проверка пароля!
    if($request->password == $user->password){
        $token = $user->createToken($request->device_name)->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        return $token;
    }else{
        return null;
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
