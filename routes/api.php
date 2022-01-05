<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\BranchController;
use App\Http\Controllers\OtherBankController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\AccessControlController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\NavigationItemController;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::get('/list_of_send_money',[SendMoneyController::class,'index']);
Route::post('/send_money',[SendMoneyController::class,'store']);
Route::get('/user_send_money_list/{id}',[SendMoneyController::class,'show']);
Route::get('/user_payment_history/{id}',[SendMoneyController::class,'viewAllPaymentHistory']);

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
Route::put('/cancel_request/{id}',[PaymentRequestController::class,'update']);


Route::get('/list_of_loan_request',[LoanController::class,'index']);
Route::post('/loan_request',[LoanController::class,'store']);
Route::get('/user_loan_request_list/{id}',[LoanController::class,'show']);

Route::get('/list_of_fixed_deposit',[FixedDepoController::class,'index']);
Route::post('/fixed_deposit',[FixedDepoController::class,'store']);
Route::get('/user_fixed_deposit_list/{id}',[FixedDepoController::class,'show']);


Route::get('/list_of_currency',[CurrencyController::class,'index']);
Route::post('/currency',[CurrencyController::class,'store']);
Route::put('/update_currency_status/{id}',[CurrencyController::class,'update']);
Route::put('/update_currency/{id}',[CurrencyController::class,'update']);
Route::put('/update_currency_status/{id}',[CurrencyController::class,'updateCurrencyStatus']);
Route::delete('/delete_currency/{id}',[CurrencyController::class,'destroy']);


Route::get('/list_of_fdr_plans',[FDRPlanController::class,'index']);
Route::post('/fdr_plan',[FDRPlanController::class,'store']);
Route::put('/fdr_update_status/{id}',[FDRPlanController::class,'updateFDRStatus']);
Route::put('/fdr_update/{id}',[FDRPlanController::class,'update']);
Route::delete('/delete_fdr/{id}',[FDRPlanController::class,'destroy']);


Route::get('/users',[UserListController::class,'index']);
Route::post('/create_user',[UserListController::class,'store']);


Route::get('/list_of_deposit',[DepositController::class,'index']);
Route::post('/create_deposit',[DepositController::class,'store']);
Route::put('/update_deposit/{id}',[DepositController::class,'update']);
Route::delete('/delete_deposit/{id}',[DepositController::class,'destroy']);


Route::get('/list_of_loan_product',[LoanProductController::class,'index']);
Route::post('/loan_product',[LoanProductController::class,'store']);
Route::put('/update_status/{id}',[LoanProductController::class,'update']);
Route::put('/update_loan_product/{id}',[LoanProductController::class,'edit']);
Route::delete('/delete_loan_product/{id}',[LoanProductController::class,'destroy']);


Route::get('/list_of_branches',[BranchController::class,'index']);
Route::post('/branch',[BranchController::class,'store']);
Route::put('/update_branch/{id}',[BranchController::class,'update']);
Route::delete('/delete_branch/{id}',[BranchController::class,'destroy']);


Route::get('/list_of_other_banks',[OtherBankController::class,'index']);
Route::post('/other_bank',[OtherBankController::class,'store']);
Route::put('/update_other_bank_status/{id}',[OtherBankController::class,'updateStatus']);
Route::put('/update_other_bank/{id}',[OtherBankController::class,'update']);
Route::put('/delete_other_bank/{id}',[OtherBankController::class,'destroy']);


Route::get('/list_of_services',[ServiceController::class,'index']);
Route::post('/create_service',[ServiceController::class,'store']);
Route::put('/update_service/{id}',[ServiceController::class,'update']);
Route::delete('/delete_service/{id}',[ServiceController::class,'destroy']);


Route::get('/list_of_faqs',[FAQController::class,'index']);
Route::post('/create_faq',[FAQController::class,'store']);
Route::put('/update_faq_status/{id}',[FAQController::class,'update']);
Route::put('/update_faq/{id}',[FAQController::class,'edit']);
Route::delete('/delete_faq/{id}',[FAQController::class,'destroy']);


Route::get('/list_of_testimonials',[TestimonialController::class,'index']);
Route::post('/create_testimonial',[TestimonialController::class,'store']);
Route::put('/update_testimonial_status/{id}',[TestimonialController::class,'update']);
Route::put('/update_testimonial/{id}',[TestimonialController::class,'edit']);
Route::delete('/delete_testimonial/{id}',[TestimonialController::class,'destroy']);


Route::get('/list_of_teams',[TeamController::class,'index']);
Route::post('/create_team',[TeamController::class,'store']);
Route::put('/update_team/{id}',[TeamController::class,'update']);
Route::delete('/delete_team/{id}',[TeamController::class,'destroy']);


Route::get('/list_of_support_tickets',[SupportTicketController::class,'index']);
Route::post('/support_ticket',[SupportTicketController::class,'store']);
Route::put('/update_support_ticket_status/{id}',[SupportTicketController::class,'update']);
Route::put('/assign_priority/{id}',[SupportTicketController::class,'priority']);
Route::put('/assign_operator_id/{id}',[SupportTicketController::class,'assignOperatorID']);
Route::put('/assign_closed_user_id/{id}',[SupportTicketController::class,'assignClosedUserID']);


Route::get('/list_of_gift_cards',[GiftCardController::class,'index']);
Route::get('/list_of_active_gift_cards',[GiftCardController::class,'activeGiftCard']);
Route::get('/list_of_used_gift_cards',[GiftCardController::class,'usedGiftCards']);
Route::post('/gift_card',[GiftCardController::class,'store']);
Route::put('/update_gift_card/{id}',[GiftCardController::class,'update']);
Route::put('/update_used_time/{id}',[GiftCardController::class,'updateUsedTime']);
Route::delete('/delete_gift_card/{id}',[GiftCardController::class,'destroy']);


Route::get('/list_of_user_roles',[UserRoleController::class,'index']);
Route::post('/user_role',[UserRoleController::class,'store']);
Route::put('/update_user_role/{id}',[UserRoleController::class,'update']);
Route::delete('/delete_user_role/{id}',[UserRoleController::class,'destroy']);


Route::get('/list_of_access_permission',[AccessControlController::class,'index']);
Route::post('/access_permission',[AccessControlController::class,'store']);
Route::put('/update_access_permission/{id}',[AccessControlController::class,'update']);
Route::delete('/delete_access_permission/{id}',[AccessControlController::class,'destroy']);


Route::get('/list_of_navigations',[NavigationController::class,'index']);
Route::post('/navigation',[NavigationController::class,'store']);
Route::put('/update_navigation/{id}',[NavigationController::class,'update']);
Route::delete('/delete_navigation/{id}',[NavigationController::class,'destroy']);


Route::get('/list_of_navigation_items',[NavigationItemController::class,'index']);
Route::post('/navigation_item',[NavigationItemController::class,'store']);
Route::put('/update_navigation_item/{id}',[NavigationItemController::class,'update']);
Route::delete('/delete_navigation_item/{id}',[NavigationItemController::class,'destroy']);
