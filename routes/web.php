<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\CreatePost;
use App\Http\Livewire\CreateClient;
use App\Http\Livewire\TariffManagement;
use App\Http\Livewire\CreateTariff;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\ClientManagement;
use App\Http\Livewire\AdditionalOptionsManagement;
use App\Http\Livewire\CreateAdditionalOption;
use App\Http\Livewire\EditTariff;
use App\Http\Livewire\PersonalCabinet;
use App\Http\Livewire\BusinessCabinet;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\ClientAdditionalOptions;
use App\Http\Livewire\EditClient;
use App\Http\Livewire\ClientRegisterAdditionalOption;
use App\Http\Livewire\StatusManagement;
use App\Http\Livewire\SpeedTest;
use App\Http\Livewire\TermsAndConditions;
use App\Http\Controllers\LanguageController;
use App\Http\Livewire\PersonalCabinetEditClient;
// use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/myhome', [HomeController::class, 'index'])->name('home.index');
Route::get('/create-post', CreatePost::class)->name('create-post');

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/terms-conditions', TermsAndConditions::class)->name('terms-conditions');

Route::get('/change-language/{language}', [LanguageController::class, 'changeLanguage']);

Route::group(['middleware' => ['role:individual_client']], function(){
    Route::get('/personal-cabinet', PersonalCabinet::class)->name('personal-cabinet');
    // Route::get('/personal-cabinet/edit-profile{id}', PersonalCabinetEditClient::class)->name('personal-cabinet-edit-profile');
});

Route::group(['middleware' => ['role:corporate_client']], function(){
    Route::get('/business-cabinet', BusinessCabinet::class)->name('business-cabinet');
    Route::get('/speed-test', SpeedTest::class)->name('speed-test');
});

Route::group(['middleware' => ['role:administrator']], function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin-profile', UserProfile::class)->name('admin-profile');
    Route::get('/client-management', ClientManagement::class)->name('client-management');
    Route::get('/create-client', CreateClient::class)->name('create-client');
    Route::get('/tariff-management', TariffManagement::class)->name('tariffs');
    Route::get('/create-tariff', CreateTariff::class)->name('create-tariff');
    Route::get('/edit-tariff/{id}', EditTariff::class)->name('edit-tariff');
    Route::get('/additional-options-management', AdditionalOptionsManagement::class)->name('additional-options-management');
    Route::get('/create-additional-option', CreateAdditionalOption::class)->name('create-additional-option');
    Route::get('/edit-client/{isCorporate}{id}', EditClient::class)->name('edit-client');
    Route::get('/{isCorporate}{id}/additional-options', ClientAdditionalOptions::class)->name('client-additional-options');
    Route::get('/{isCorporate}{id}/new-additional-option', ClientRegisterAdditionalOption::class)->name('client-register-additional-option');
    Route::get('/status-management', StatusManagement::class)->name('status-management');
});

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // Route::get('/personal-cabinet', PersonalCabinet::class)->name('personal-cabinet');
    // Route::get('/business-cabinet', BusinessCabinet::class)->name('business-cabinet');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    // Route::get('/admin-profile', UserProfile::class)->name('admin-profile');
    // Route::get('/client-management', ClientManagement::class)->name('client-management');
    // Route::get('/create-client', CreateClient::class)->name('create-client');
    // Route::get('/tariff-management', TariffManagement::class)->name('tariffs');
    // Route::get('/create-tariff', CreateTariff::class)->name('create-tariff');
    // Route::get('/edit-tariff/{id}', EditTariff::class)->name('edit-tariff');
    // Route::get('/additional-options-management', AdditionalOptionsManagement::class)->name('additional-options-management');
    // Route::get('/create-additional-option', CreateAdditionalOption::class)->name('create-additional-option');
    Route::get('/checkout/{amount}/{description}', Checkout::class)->name('checkout');
    Route::post('/checkout/setStatus', Checkout::class)->name('checkout-set-status');
    // Route::get('/edit-client/{isCorporate}{id}', EditClient::class)->name('edit-client');
    // Route::get('/{isCorporate}{id}/additional-options', ClientAdditionalOptions::class)->name('client-additional-options');
    // Route::get('/{isCorporate}{id}/new-additional-option', ClientRegisterAdditionalOption::class)->name('client-register-additional-option');
    // Route::get('/status-management', StatusManagement::class)->name('status-management');
    // Route::get('/business-cabinet', CorporateCabinet::class)->name('business-cabinet');
});

