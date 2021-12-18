<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\ExChangeMoneyController;
use App\Http\Controllers\WireTransferController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\FixedDepoController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\FDRPlanController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\LoanProductController;

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


Route::get('/list_of_send_money',[SendMoneyController::class,'index']);
Route::post('/send_money',[SendMoneyController::class,'store']);
Route::get('/user_send_money_list/{id}',[SendMoneyController::class,'show']);


Route::get('/list_of_exchange_money',[ExChangeMoneyController::class,'index']);
Route::post('/exchange_money',[ExChangeMoneyController::class,'store']);
Route::get('/user_exchange_money_list/{id}',[ExChangeMoneyController::class,'show']);


Route::get('/list_of_wire_transfer',[WireTransferController::class,'index']);
Route::post('/wire_transfer',[WireTransferController::class,'store']);
Route::get('/user_wire_transfer_list/{id}',[WireTransferController::class,'show']);
Route::put('/update_status/{id}',[WireTransferController::class,'update']);


Route::get('/list_of_payment_request',[PaymentRequestController::class,'index']);
Route::post('/payment_request',[PaymentRequestController::class,'store']);
Route::get('/user_payment_request_list/{id}',[PaymentRequestController::class,'show']);


Route::get('/list_of_loan_request',[LoanController::class,'index']);
Route::post('/loan_request',[LoanController::class,'store']);
Route::get('/user_loan_request_list/{id}',[LoanController::class,'show']);

Route::get('/list_of_fixed_deposit',[FixedDepoController::class,'index']);
Route::post('/fixed_deposit',[FixedDepoController::class,'store']);
Route::get('/user_fixed_deposit_list/{id}',[FixedDepoController::class,'show']);


Route::get('/list_of_currency',[CurrencyController::class,'index']);


Route::get('/list_of_fdr_plans',[FDRPlanController::class,'index']);
Route::post('/fdr_plan',[FDRPlanController::class,'store']);
Route::put('/fdr_update_status/{id}',[FDRPlanController::class,'update']);

Route::get('/users',[UserListController::class,'index']);
Route::post('/create_user',[UserListController::class,'store']);


Route::get('/list_of_deposit',[DepositController::class,'index']);
Route::post('/create_deposit',[DepositController::class,'store']);

Route::get('/list_of_loan_product',[LoanProductController::class,'index']);
Route::post('/loan_product',[LoanProductController::class,'store']);
Route::put('/update_status/{id}',[LoanProductController::class,'update']);
