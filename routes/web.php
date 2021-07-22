<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\UserController;
use App\Models\User;

//route for front end users 
Route::get('/', [FrontEndController::class, 'home'])->name('home');
Route::get('viewmore/{slug}', [FrontEndController::class, 'showAll'])->name('showall');
Route::post('searchresult', [FrontEndController::class, 'searchResult'])->name('search');
Route::get('viewmovie/{id}', [FrontEndController::class, 'showMovie'])->name('showMovie');
Route::get('showslots/{id}', [FrontEndController::class, 'showSlot'])->middleware('auth')->name('showSlot');
Route::get('/book/{id}',[FrontEndController::class, 'bookPage'])->middleware('auth')->name('book');
Route::post('book/{id}', [FrontEndController::class, 'confirmBook'])->middleware('auth')->name('confirmbook');
Route::get('mybookings', [FrontEndController::class, 'myBookings'])->middleware('auth')->name('myBookings');
Route::get('cancelticket/{id}', [FrontEndController::class, 'cancelTicket'])->middleware('auth')->name('cancelTicket');


//routes for register
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('registerpost');
Route::get('createpassword', [RegisterController::class, 'verify'])->middleware(['guest','pageinfo'])->name('createpassowrd');
Route::post('createpassword', [RegisterController::class, 'getverify'])->middleware('guest')->name('createpassowrdpost');


//route to login get to show llogin page and route to login post to process login 
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')->name('login post');

//route to logout
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

//routes for forgot passowrd
Route::get('forgot_password', [ForgotPasswordController::class, 'forgot'])->middleware('guest')->name('forgotpassowrd');
Route::post('forgot_password', [ForgotPasswordController::class, 'passreset'])->middleware('guest')->name('forgotpasswordpost');
Route::get('newpassword', [ForgotPasswordController::class, 'verify'])->middleware(['guest','pageinfo'])->name('newpassowrd');
Route::post('newpassword', [ForgotPasswordController::class, 'getverify'])->middleware('guest')->name('newpasswordpost');




//group routes for all admin pages the middleware adminrole is defined in route named checkrole
Route::group(['middleware' => ['auth','adminrole']], function() {
    Route::get('admin_index', function () {
        return view('admin.index');
    })->name('adminhome');
    
    //routes to viw and edit my profile
    Route::get('myprofile', [UserController::class, 'viewProfile'])->name('myprofile');
    Route::post('editprofile/{id}', [UserController::class, 'editProfile'])->name('editprofile');
    Route::post('newpassword/{id}', [UserController::class, 'editPassword'])->name('newpassowrd');

    //routes for users crud
    Route::get('allusers', [UserController::class, 'index'])->name('allusers');
    Route::get('createuser', [UserController::class, 'create'])->name('addusers');
    Route::post('createuser', [UserController::class, 'adduser'])->name('adduserspost');
    Route::get('edituser/{id}', [UserController::class, 'edituser'])->name('edituser');
    Route::post('edituser/{id}', [UserController::class, 'updateuser'])->name('edituserpost');
    Route::get('deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deletuser');


    //routes for theater inventry
    Route::get('alltheater', [TheaterController::class, 'allTheater'])->name('alltheaters');
    Route::get('addtheater', [TheaterController::class, 'addTheater'])->name('addtheater');
    Route::post('getcity', [TheaterController::class, 'getCity'])->name('getcity');
    Route::post('addtheater', [TheaterController::class, 'createTheater'])->name('addtheaterpost');
    Route::get('deletetheater/{id}', [TheaterController::class, 'deleteTheater'])->name('deletetheater');
    Route::get('edittheater/{id}', [TheaterController::class, 'editTheater'])->name('edittheater');
    Route::post('edittheater/{id}', [TheaterController::class, 'updateTheater'])->name('edittheaterpost');


    //routes for screen crud
    Route::get('allscreen/{id}', [ScreenController::class, 'allScreen'])->name('allscreen');
    Route::get('addscreen/{id}', [ScreenController::class, 'addScreen'])->name('addscreen');
    Route::post('addscreen/{id}', [ScreenController::class, 'createScreen'])->name('addscreenpost');
    Route::get('/deletescreen/{id}', [ScreenController::class, 'deleteScreen'])->name('deletescreen');
    Route::get('/editscreen/{id}', [ScreenController::class, 'editScreen'])->name('editscreen');
    Route::post('/editscreen/{id}', [ScreenController::class, 'updateScreen'])->name('editscreenpost');

    //routes for movie crud
    Route::get('allmovies', [MovieController::class, 'allMovie'])->name('allmovies');  
    Route::get('addmovie', [MovieController::class, 'addMovie'])->name('addmovie');
    Route::post('addmovie', [MovieController::class, 'createMovie'])->name('addmoviepost');
    Route::get('deletemovie/{id}', [MovieController::class, 'deleteMovie'])->name('deletemovie');
    Route::get('editmovie/{id}', [MovieController::class, 'editMovie'])->name('editmovie');
    Route::post('editmovie/{id}', [MovieController::class, 'updateMovie'])->name('editmoviepost');


    //routes for cast crud
    Route::get('addcast/{id}', [CastController::class, 'addCast'])->name('addcast');
    Route::post('addcast', [CastController::class, 'createCast'])->name('addcastpost');
    Route::get('deletecast/{id}', [CastController::class, 'deleteCast'])->name('deletecast');


    //routes for show crud
    Route::get('addshow',[ShowController::class, 'addShow'])->name ('addshowget');
    Route::post('addshow',[ShowController::class, 'createShow'])->name ('addshowpost');
    Route::post('getscreen',[ShowController::class, 'getscreen'])->name ('getscreen');
    Route::get('allshow',[ShowController::class, 'allShow'])->name ('allshow'); 
    Route::get('editshow/{id}', [ShowController::class, 'editShow'])->name('editshow');
    Route::post('editshow/{id}', [ShowController::class, 'updateShow'])->name('editshowpost');
    Route::get('deleteshow/{id}', [ShowController::class, 'deleteshows'])->name('deleteshow');


    Route::get('allbookings', [BookController::class, 'allBookings'])->name('allbookings');
});