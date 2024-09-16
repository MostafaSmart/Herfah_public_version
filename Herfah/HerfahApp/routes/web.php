<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfoliController;
use App\Http\Controllers\ClientWorkerOrderController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CustomController;
use App\Http\Middleware\AuthoMiddleWare;

use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index']);
Route::get('/team{id}', [WebsiteController::class, 'show'])->name('team.show');
Route::get('/workerList{id}', [WebsiteController::class, 'showreq'])->name('Requests.showreq');
Route::get('/index', [WebsiteController::class, 'index'])->name('index.page');
Route::get('/getportfoli/{id}', [CustomController::class, 'portfolis']);


//Routes For Dashboard
//Routes For Dashboard

Route::middleware(['auth', 'verified', AuthoMiddleWare::class])->group(function (){
Route::get('/adminDashboard', [UserController::class, 'adminDashboardHome'])->name('admin.dashboard');
Route::resource('dept', DepartmentController::class);
Route::resource('worker', WorkerController::class);
Route::get('/fetchall', [DepartmentController::class, 'fetchAll'])->name('fetchAll');
Route::get('dept/categories', [DepartmentController::class, 'getCategories'])->name('dept.categories');
Route::get('workersListDash', [WorkerController::class, 'workersViewDashboard']);
Route::get('/fetchAllWorkers', [WorkerController::class, 'fetchAllWorkers'])->name('fetchAllWorkers');
Route::get('/fetchAllClient', [ClientController::class, 'fetchAllClient'])->name('fetchAllClient');
Route::get('/storeFromRequest/{id}', [WorkerController::class, 'storeFromRequests'])->name('addFromOrderTo');
Route::get('rejectFromOrderTo/{id}', [WorkerController::class, 'rejectFromOrderTo'])->name('reject.FromOrderTo');
Route::get('add_worker', [WorkerController::class, 'addWorkerView'])->name('worker.add');
Route::get('/workerDetails/{id}', [WorkerController::class, 'showWorkerDetailsDashboad'])->name('worker-details');
Route::put('/updateWorkerInfo', [WorkerController::class, 'updateWorkerInfoFromDashboard'])->name('update.worker.info');
Route::resource('order',ClientWorkerOrderController::class);
Route::get('/ordersList', [ClientWorkerOrderController::class, 'fetchAllOrders'])->name('fetch.All.Order');
Route::post('/addClientOrder', [ClientWorkerOrderController::class, 'addOrder']);
Route::get('/orderDetails', [ClientWorkerOrderController::class, 'orderDetails'])->name('order.details');
Route::get('/fetchAllUser', [UserController::class, 'fetchAllUser'])->name('fetchAllUser');
Route::get('/adminAccount', [UserController::class, 'adminProfile'])->name('admin.profile');
Route::get('/showWorkRequest',[RequestsController::class, 'showWorkRequests'])->name('show.work.request');
Route::get('/showWorkersRequest',[RequestsController::class, 'showWorkersRequests'])->name('show.workers.requests');
Route::get('/showWorkDetailsRequest/{id}', [RequestsController::class, 'workDetailsRequest'])->name('work.detailsRequest.worker');
Route::get('/showWorkerDetailsRequest/{id}', [RequestsController::class, 'workerDetailsRequest'])->name('worker.detailsRequest.client');
Route::post('add_portfolio', [PortfoliController::class, 'addPortfolioFromDashboard'])->name('portfolio.add');
Route::post('/accountUpdate', [UserController::class, 'updateUserAccountfromDashboard'])->name('user.updateAccount');
Route::post('/adminUpdatePassword', [UserController::class, 'updateAdminPassword'])->name('admin.updatepassword');
Route::get('/clientDetails/{id}', [ClientController::class, 'clientDetailsFromDashboard']);
Route::get('/clientOrders/{id}', [ClientWorkerOrderController::class, 'fetchAllOrdersClient'])->name('client.ordersList');
Route::resource('message', MessageController::class);
Route::get('/reviewsList',  [ClientWorkerOrderController::class, 'reviews']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('dept', DepartmentController::class);
    Route::get('/fetchall', [DepartmentController::class, 'fetchAll'])->name('fetchAll');
    Route::get('dept/categories', [DepartmentController::class, 'getCategories'])->name('dept.categories');
    Route::resource('client', ClientController::class);
    Route::resource('worker', WorkerController::class);
    Route::resource('user', UserController::class);
    Route::resource('request', RequestsController::class);
    Route::resource('message', MessageController::class);
    Route::resource('portfoli', PortfoliController::class);
    Route::resource('order', ClientWorkerOrderController::class);
});




require __DIR__ . '/auth.php';
