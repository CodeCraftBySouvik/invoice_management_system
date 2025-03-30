<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\ProductController;
use App\Http\Controllers\App\CustomerController;
use App\Http\Controllers\App\QuotationController;
use App\Http\Controllers\App\InvoiceController;
use App\Http\Controllers\App\ReportController;
use App\Http\Controllers\App\VATController;
use App\Http\Controllers\App\SettingsController;
use App\Http\Controllers\App\TermController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// For Paid Subscriber
Route::group(['namespace' => 'app','prefix'=>'app'],function(){
    // Route::get('/login', [AdminUserController::class, 'login'])->name('admin.login');
    // Route::post('/login/submit', [AdminUserController::class, 'loginSubmit'])->name('admin.login.submit');
    // Route::post('/logout/submit', [AdminUserController::class, 'logoutSubmit'])->name('admin.logout.submit');
    // Route::get('/setup', [AdminDatabaseController::class, 'setup'])->name('admin.setup');
    // Route::post('/setup/submit', [AdminDatabaseController::class, 'setupSubmit'])->name('admin.setup.submit');
    // Route::get('/setup/step/{id}', 'DatabaseController@setupStep')->name('admin.setup.step');
    // Route::post('/setup/step/submit/{id}', 'DatabaseController@setupStepSubmit')->name('admin.setup.step.submit');
    // Route::get('/setup/dump', 'DatabaseController@setupDump')->name('admin.setup.dump');
    // Route::get('/register', [AdminUserController::class, 'register'])->name('register');

    // Route::group(['middleware'=>'auth:web'],function(){ //will work more on multiple gaurd
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Route::group(['prefix'=>'settings'],function(){
        //     // Route::get('/', [AdminGeneralController::class, 'settings'])->name('admin.settings');

        //     Route::get('/{name}', [AdminGeneralController::class, 'settings'])->name('admin.settings');
        //     Route::post('/submit', [AdminGeneralController::class, 'settingsSubmit'])->name('admin.settings.submit');
        //     Route::post('/site/logo/submit', [AdminGeneralController::class, 'siteLogoSubmit'])->name('admin.site.logo.submit');
        //     Route::post('/site/favicon/submit', [AdminGeneralController::class, 'siteFaviconSubmit'])->name('admin.site.favicon.submit');
        // });

        Route::group(['prefix'=>'terms'],function(){
            Route::get('/', [TermController::class, 'index'])->name('admin.terms.list');
            Route::get('/{name}', [TermController::class, 'list'])->name('admin.term.list');
            Route::post('/{name}/submit', [TermController::class, 'addSubmit'])->name('admin.term.add.submit');
            Route::get('/{name}/list/ajax', [TermController::class, 'listAjax'])->name('admin.term.list.ajax');
            Route::get('/{name}/view/{id}', [TermController::class, 'view'])->name('admin.term.view');
            Route::get('/{name}/edit/{id}', [TermController::class, 'edit'])->name('admin.term.edit');
            Route::get('/{name}/status/{id}', [TermController::class, 'status'])->name('admin.term.status');
            Route::get('/{name}/delete/{id}', [TermController::class, 'delete'])->name('admin.term.delete');
        });

        // Route::group(['prefix' => 'account'], function () {
        //     Route::get('/', [AdminAccountController::class, 'edit'])->name('admin.account.edit');
        //     Route::post('/submit', [AdminAccountController::class, 'editSubmit'])->name('admin.account.edit.submit');
        // });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/add', [CustomerController::class, 'add'])->name('admin.customer.add');
            Route::post('/add/submit', [CustomerController::class, 'addSubmit'])->name('admin.customer.add.submit');
            Route::get('/view/{id}', [CustomerController::class, 'view'])->name('admin.customer.view');
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
            Route::post('/edit/submit/{id}', [CustomerController::class, 'editSubmit'])->name('admin.customer.edit.submit');
            // Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('admin.customer.delete');
            // Route::post('/image/submit/{id}', [CustomerController::class, 'imageSubmit'])->name('admin.customer.image.submit');
            // Route::get('/status/{id}', [CustomerController::class, 'status'])->name('admin.customer.status');
            Route::get('/list', [CustomerController::class, 'list'])->name('admin.customer.list');
            Route::get('/list/ajax', [CustomerController::class, 'listAjax'])->name('admin.customer.list.ajax');
        });

        Route::group(['prefix' => 'quotation'], function () {
            Route::get('/add', [QuotationController::class, 'add'])->name('admin.quotation.add');
            Route::post('/add/submit', [QuotationController::class, 'addSubmit'])->name('admin.quotation.add.submit');
            Route::get('/view/{id}', [QuotationController::class, 'view'])->name('admin.quotation.view');
            Route::get('/edit/{id}', [QuotationController::class, 'edit'])->name('admin.quotation.edit');
            Route::post('/edit/submit/{id}', [QuotationController::class, 'editSubmit'])->name('admin.quotation.edit.submit');
            Route::get('/print/{id}', [QuotationController::class, 'print'])->name('admin.quotation.print');
            // Route::get('/delete/{id}', [QuotationController::class, 'delete'])->name('admin.quotation.delete');
            // Route::post('/image/submit/{id}', [QuotationController::class, 'imageSubmit'])->name('admin.quotation.image.submit');
            // Route::get('/status/{id}', [QuotationController::class, 'status'])->name('admin.quotation.status');
            Route::get('/list', [QuotationController::class, 'list'])->name('admin.quotation.list');
            Route::get('/list/ajax', [QuotationController::class, 'listAjax'])->name('admin.quotation.list.ajax');
        });

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/add', [InvoiceController::class, 'add'])->name('admin.invoice.add');
            Route::post('/add/submit', [InvoiceController::class, 'addSubmit'])->name('admin.invoice.add.submit');
            Route::get('/view/{id}', [InvoiceController::class, 'view'])->name('admin.invoice.view');
            Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
            Route::post('/edit/submit/{id}', [InvoiceController::class, 'editSubmit'])->name('admin.invoice.edit.submit');
            Route::get('/print/{id}', [InvoiceController::class, 'print'])->name('admin.invoice.print');
            // Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('admin.invoice.delete');
            // Route::post('/image/submit/{id}', [InvoiceController::class, 'imageSubmit'])->name('admin.invoice.image.submit');
            // Route::get('/status/{id}', [InvoiceController::class, 'status'])->name('admin.invoice.status');
            Route::get('/list', [InvoiceController::class, 'list'])->name('admin.invoice.list');
            Route::get('/list/ajax', [InvoiceController::class, 'listAjax'])->name('admin.invoice.list.ajax');
        });

        Route::group(['prefix' => 'report'], function () {
            // Route::get('/', [ReportController::class, 'index'])->name('admin.reports');
            // Route::get('/add', [InvoiceController::class, 'add'])->name('admin.invoice.add');
            Route::post('/add/submit', [ReportController::class, 'addSubmit'])->name('admin.report.add.submit');
            // Route::get('/view/{id}', [InvoiceController::class, 'view'])->name('admin.invoice.view');
            // Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
            // Route::post('/edit/submit/{id}', [InvoiceController::class, 'editSubmit'])->name('admin.invoice.edit.submit');
            // Route::get('/print/{id}', [InvoiceController::class, 'print'])->name('admin.invoice.print');
            // Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('admin.invoice.delete');
            // Route::post('/image/submit/{id}', [InvoiceController::class, 'imageSubmit'])->name('admin.invoice.image.submit');
            // Route::get('/status/{id}', [InvoiceController::class, 'status'])->name('admin.invoice.status');
            Route::get('/list', [ReportController::class, 'list'])->name('admin.report.list');
            Route::get('/list/ajax', [ReportController::class, 'listAjax'])->name('admin.report.list.ajax');
        });

        Route::group(['prefix' => 'vat'], function () {
            // Route::get('/', [ReportController::class, 'index'])->name('admin.reports');
            // Route::get('/add', [InvoiceController::class, 'add'])->name('admin.invoice.add');
            Route::post('/add/submit', [VATController::class, 'addSubmit'])->name('admin.vat.add.submit');
            // Route::get('/view/{id}', [InvoiceController::class, 'view'])->name('admin.invoice.view');
            // Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
            // Route::post('/edit/submit/{id}', [InvoiceController::class, 'editSubmit'])->name('admin.invoice.edit.submit');
            // Route::get('/print/{id}', [InvoiceController::class, 'print'])->name('admin.invoice.print');
            // Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('admin.invoice.delete');
            // Route::post('/image/submit/{id}', [InvoiceController::class, 'imageSubmit'])->name('admin.invoice.image.submit');
            // Route::get('/status/{id}', [InvoiceController::class, 'status'])->name('admin.invoice.status');
            Route::get('/list', [VATController::class, 'list'])->name('admin.vat.list');
            Route::get('/list/ajax', [VATController::class, 'listAjax'])->name('admin.vat.list.ajax');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
            Route::post('/add/submit', [ProductController::class, 'addSubmit'])->name('admin.product.add.submit');
            Route::get('/view/{id}', [ProductController::class, 'view'])->name('admin.product.view');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('/edit/submit/{id}', [AdminProductController::class, 'editSubmit'])->name('admin.product.edit.submit');
            // Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            // Route::post('/cover/submit/{id}', [AdminProductController::class, 'coverSubmit'])->name('admin.product.cover.submit');
            // Route::get('/status/{id}', [AdminProductController::class, 'status'])->name('admin.product.status');
            Route::get('/list', [ProductController::class, 'list'])->name('admin.product.list');
            Route::get('/list/ajax', [ProductController::class, 'listAjax'])->name('admin.product.list.ajax');
        });

        Route::group(['prefix'=>'settings'],function(){
            Route::get('/', [SettingsController::class, 'index'])->name('admin.settings');
    
            //     Route::get('/{name}', [AdminGeneralController::class, 'settings'])->name('admin.settings');
                Route::post('/submit', [SettingsController::class, 'submit'])->name('admin.settings.submit');
            //     Route::post('/site/logo/submit', [AdminGeneralController::class, 'siteLogoSubmit'])->name('admin.site.logo.submit');
            //     Route::post('/site/favicon/submit', [AdminGeneralController::class, 'siteFaviconSubmit'])->name('admin.site.favicon.submit');
            });

    // });
});


// For Frontend
Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/create-account', [HomeController::class, 'CreateAccount'])->name('create-account');
    
    Route::middleware(['redirect.signup'])->group(function () {
        Route::get('/setup', [HomeController::class, 'setup'])->name('setup');
        Route::get('/free-trial-dashboard', [HomeController::class, 'FreeTrialdashboard'])->name('free-trial-dashboard');
        Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
        Route::get('/package-customize', [HomeController::class, 'package_customize'])->name('package-customize');
        Route::post('/package-customize-store', [HomeController::class, 'package_customize_store'])->name('package-customize-store');
        Route::post('/start-checkout', [HomeController::class, 'start_checkout'])->name('start-checkout');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('/process-card-payment', [HomeController::class, 'processCardPayment'])->name('process-card-payment');
        Route::post('/process-stripe-payment', [PaymentController::class, 'processStripePayment'])->name('process-stripe-payment');
        Route::get('/checkout/success', [HomeController::class, 'checkoutSuccess'])->name('checkout-success');
    }); 
    Route::post('/setup-submit', [HomeController::class, 'setupSubmit'])->name('setup-submit');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register/submit', [UserController::class, 'registerSubmit'])->name('register.submit');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/submit', [UserController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/otp/{token}', [UserController::class, 'otp'])->name('otp');
    Route::post('/resend-otp', [UserController::class, 'resendOtp'])->name('resend-otp');
    Route::post('/otp/submit', [UserController::class, 'otpSubmit'])->name('otp.submit');

    Route::get('/self', [UserController::class, 'self'])->name('self'); //dummy

    
    // Route::get('/about', [HomeController::class, 'about'])->name('about');
    // Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    // Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add-to-cart');
    // Route::get('/remove-cart/{id}', [HomeController::class, 'removeCart'])->name('remove-cart');
    // Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    // Route::post('/checkout/submit', [HomeController::class, 'checkoutSubmit'])->name('checkout.submit');
    // Route::get('/checkout/success', [HomeController::class, 'checkoutSuccess'])->name('checkout.success');
    // Route::get('/checkout/cancel', [HomeController::class, 'checkoutCancel'])->name('checkout.cancel');
    // Route::get('/checkout-thank-you', [HomeController::class, 'checkoutThankYou'])->name('checkout-thank-you');

    // Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product');
    // // Route::get('/product/lsm-v85-tyre-baler', [HomeController::class, 'product1'])->name('product1');
    // // Route::get('/product/gradeall-mk2-tyre-baler', [HomeController::class, 'product2'])->name('product2');

    // Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank-you');
    // Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
    // Route::get('/login-user', [HomeController::class, 'loginUser'])->name('login-user');
    // Route::get('/register-user', [HomeController::class, 'registerUser'])->name('register-user');
    // Route::get('/my-account', [HomeController::class, 'myAccount'])->name('my-account');
    // Route::get('/my-account/orders', [HomeController::class, 'myAccountOrders'])->name('orders');
    // Route::get('/my-account/orders/ajax', [HomeController::class, 'myAccountOrdersAjax'])->name('orders.ajax');
    // Route::get('/my-account/orders/view/{id}', [HomeController::class, 'myAccountOrdersView'])->name('orders.view');

    // // User login and register routes
    // Route::post('/login/submit', [HomeController::class, 'loginSubmit'])->name('login.submit');
    // Route::post('/register/submit', [HomeController::class, 'registerSubmit'])->name('register.submit');
    // Route::post('/account/submit', [HomeController::class, 'accountSubmit'])->name('account.submit');
    // Route::post('/logout/submit', [HomeController::class, 'logoutSubmit'])->name('logout.submit');
    // Route::post('/form/submit', [HomeController::class, 'formSubmit'])->name('form.submit');
});