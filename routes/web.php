<?php
use App\Notifications\FirstMailNotification;
use App\Notifications\LoginNotification;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login-notify', function () {
    
    $user = Auth::user();
    $user->notify(new LoginNotification());
     return redirect('/retrieve/login-notify');
    });
    
Route::get('/retrieve/login-notify', function () {
    
    $user = Auth::user();
    $notifications = $user->unreadNotifications;

    return view('dashboard', compact('notifications'));
    });
    






Route::get('/notification', function () {
    
$user = User::find(1);
$order="order has shipped ";
$user->notify(new FirstMailNotification($order));
dd('done');
});





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
