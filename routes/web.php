<?php

use App\Http\Controllers\BySlugController;
use App\Http\Controllers\dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\dashboard\LogoutController as DashboardLogoutController;
use App\Http\Controllers\dashboard\CustomersController as DashboardCustomersController;
use App\Http\Controllers\dashboard\products\IndexController as DashboardProductsIndexController;
use App\Http\Controllers\dashboard\products\AddController as DashboardProductsAddController;
use App\Http\Controllers\dashboard\products\ByIdController as DashboardProductsByIdController;
use App\Http\Controllers\dashboard\invitations\IndexController as DashboardInvitationsIndexController;
use App\Http\Controllers\dashboard\invitations\AddController as DashboardInvitationsAddController;
use App\Http\Controllers\dashboard\invitations\byId\IndexController as DashboardInvitationsByIdIndexController;
use App\Http\Controllers\dashboard\invitations\byId\OtherController as DashboardInvitationsByIdOtherController;
use App\Http\Controllers\dashboard\invitations\templates\IndexController as DashboardInvitationsTemplatesIndexController;
use App\Http\Controllers\dashboard\invitations\templates\ByCodeController as DashboardInvitationsTemplatesByCodeController;
use App\Http\Controllers\dashboard\orders\IndexController as DashboardOrdersIndexController;
use App\Http\Controllers\dashboard\orders\ByIdController as DashboardOrdersByIdController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Http\Request;
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

Route::get('/', [IndexController::class, 'show']);
Route::get('/login', [LoginController::class, 'show'])->middleware('guest');
Route::post('/login', [LoginController::class, 'attemp'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/dashboard', [DashboardIndexController::class, 'show'])->middleware('auth');
Route::get('/dashboard/customers', [DashboardCustomersController::class, 'show'])->middleware('auth');
Route::get('/dashboard/products', [DashboardProductsIndexController::class, 'show'])->middleware('auth');
Route::get('/dashboard/products/add', [DashboardProductsAddController::class, 'show'])->middleware('auth');
Route::post('/dashboard/products/add', [DashboardProductsAddController::class, 'store'])->middleware('auth');
Route::get('/dashboard/products/{id}', [DashboardProductsByIdController::class, 'show'])->middleware('auth');
Route::put('/dashboard/products/{id}', [DashboardProductsByIdController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/products/{id}', [DashboardProductsByIdController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/invitations', [DashboardInvitationsIndexController::class, 'show'])->middleware('auth');
Route::get('/dashboard/invitations/add', [DashboardInvitationsAddController::class, 'show'])->middleware('auth');
Route::post('/dashboard/invitations/add', [DashboardInvitationsAddController::class, 'store'])->middleware('auth');
Route::get('/dashboard/invitations/templates', [DashboardInvitationsTemplatesIndexController::class, 'show'])->middleware('auth');
Route::get('/dashboard/invitations/templates/{code}', [DashboardInvitationsTemplatesByCodeController::class, 'show'])->middleware('auth');
Route::post('/dashboard/invitations/templates/{code}', [DashboardInvitationsTemplatesByCodeController::class, 'buy'])->middleware('auth');
Route::get('/dashboard/invitations/{id}', [DashboardInvitationsByIdIndexController::class, 'show'])->middleware('auth');
Route::put('/dashboard/invitations/{id}', [DashboardInvitationsByIdIndexController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/invitations/{id}', [DashboardInvitationsByIdIndexController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/invitations/{id}/other', [DashboardInvitationsByIdOtherController::class, 'show'])->middleware('auth');
Route::post('/dashboard/invitations/{id}/other', [DashboardInvitationsByIdOtherController::class, 'customActionPost'])->middleware('auth');
Route::put('/dashboard/invitations/{id}/other', [DashboardInvitationsByIdOtherController::class, 'customActionPut'])->middleware('auth');
Route::delete('/dashboard/invitations/{id}/other', [DashboardInvitationsByIdOtherController::class, 'customActionDelete'])->middleware('auth');
Route::get('/dashboard/orders', [DashboardOrdersIndexController::class, 'show'])->middleware('auth');
Route::get('/dashboard/orders/{id}', [DashboardOrdersByIdController::class, 'show'])->middleware('auth');
Route::put('/dashboard/orders/{id}', [DashboardOrdersByIdController::class, 'customActionPut'])->middleware('auth');
Route::get('/dashboard/logout', [DashboardLogoutController::class, 'show'])->middleware('auth');
Route::get('/{slug}', [BySlugController::class, 'show']);
Route::post('/{slug}', [BySlugController::class, 'store']);
