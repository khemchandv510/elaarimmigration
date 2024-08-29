<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/unsubscribe', [App\Http\Controllers\HomeController::class, 'unsubscribe'])->name('unsubscribe');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('posts', PostController::class);

    Route::resource('emails', TaskController::class);

    Route::get('imports', [\App\Http\Controllers\ImportController::class, 'index']);
    Route::post('imports', [\App\Http\Controllers\ImportController::class, 'import'])->name('importdata');


    Route::get('email-groups', [\App\Http\Controllers\EmailController::class, 'index'])->name('email.group');
    Route::post('email-groups', [\App\Http\Controllers\EmailController::class, 'store'])->name('email.group-submit');

    Route::get('smtp-config', [\App\Http\Controllers\SmtpController::class, 'index'])->name('smtp-config');

    Route::post('send-mail-submit',[\App\Http\Controllers\SendMailController::class, 'store'])->name('send.php.mailer.submit');


    Route::get("send-email", [\App\Http\Controllers\PHPMailerController::class, "email"])->name("send.email");

    Route::post("send-email", [\App\Http\Controllers\PHPMailerController::class, "composeEmail"])->name("send-test-email");
    
    
    
    Route::get("send-emails", [\App\Http\Controllers\PHPMailerController::class, "showEmailFrom"])->name("send.showEmail");
    
    Route::post("send-emails", [\App\Http\Controllers\PHPMailerController::class, "sendLiveEmail"])->name("send-live-email");
    
    



});
