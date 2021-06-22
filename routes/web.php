<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use YoHang88\LetterAvatar\LetterAvatar;
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

Route::get('/coba', function () {
   return view('layouts.user');
});

Route::get('/page', function () {
    $data = Post::where('status',1)->update(['status'=>5]);
    return $data;
});


Route::post('/coba', function (Request $request) {
    dd($request->file('thing')->store('','google'));
});

Auth::routes();

Route::get('/home',  'HomeController@index')->name('home');
Route::get('/',  'HomeController@home')->name('beranda');
Route::get('/event',  'HomeController@event')->name('user.event');
Route::get('/announcement',  'HomeController@announcement')->name('user.announcement');
Route::get('/read-post',  'HomeController@read')->name('user.baca-karya');
Route::get('/read-post/{id}',  'HomeController@readDetail')->name('user.baca-karya.detail');
Route::get('/tentang-kami',  'HomeController@tentangKami')->name('user.tentang-kami');
Route::get('/unggah-karya',  'HomeController@unggahKarya')->name('user.unggah-karya');
Route::get('/category-puisi',  'HomeController@categoryPuisi')->name('user.category-puisi');
Route::get('/category-artikel',  'HomeController@categoryArtikel')->name('user.category-artikel');
Route::get('/category-cerpen',  'HomeController@categoryCerpen')->name('user.category-cerpen');

Route::group(['prefix' => 'admin', 'middleware' => ['admin','phone']], function(){
    Route::get('/home',  'AdminController@index')->name('home.admin');
    Route::get('/karya/create',  'AdminController@karyaCreate')->name('admin.tambah.karya');
    Route::get('/user',  'AdminController@user')->name('admin.user');
    Route::get('/karya',  'AdminController@karya')->name('admin.karya');
    Route::get('/karya/{post}',  'AdminController@karya')->name('post.show');
    //Route::get('/event',  'AdminController@event')->name('event.admin');
    Route::post('/juri',  'AdminController@juriStore')->name('user.juri.store');
    Route::post('/juri-event',  'EventController@eventJuri')->name('event.juri');
    Route::post('/add-winner',  'EventWinnerController@addWinner')->name('winner.post');
    Route::delete('/user/{user}',  'AdminController@userDestroy')->name('user.destroy');
    Route::delete('/eventuser/{eventuser}',  'AdminController@eventUserDestroy')->name('eventuser.destroy');
    Route::delete('/karya/{post}',  'PostController@destroy')->name('post.destroy');
    Route::delete('/update-winner/{winner}',  'EventWinnerController@destroyWinner')->name('winner.destroy');
    Route::put('/karya/{post}',  'PostController@updateStatus')->name('post.update.status');
    Route::put('/karya/{post}/schedule',  'PostController@updateSchedule')->name('post.update.schedule');
    Route::put('/event/active/update/{event}',  'EventController@updateActive')->name('event.update.active');
    Route::put('/update-winner/{winner}',  'EventWinnerController@updateWinner')->name('winner.update');
    Route::resource('event', 'EventController');
    Route::resource('setting', 'SettingController');
    Route::resource('event-winner', 'EventWinnerController');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/profile',  'AdminController@profile')->name('admin.profile');
    Route::get('juri/profile',  'JuriController@profile')->name('juri.profile');
    Route::get('/profile',  'FunnersController@profile')->name('funner.profile');
    Route::get('/post/{post}/edit',  'FunnersController@postEdit')->name('post.edit');
    Route::put('/profile/{user}',  'UserController@updateProfile')->name('user.update');
    Route::put('/post/{post}/edit',  'PostController@update')->name('post.update');
    Route::put('/profile/image/{user}',  'UserController@updateImage')->name('user.update.image');
    Route::put('/profile/password/{user}',  'UserController@updatePassword')->name('user.update.password');
    Route::post('/karya',  'PostController@store')->name('karya.post');
});

Route::group(['prefix' => 'juri', 'middleware' => ['juri','phone']], function(){
    Route::get('/',  'JuriController@index')->name('home.juri');
    Route::get('/event',  'JuriController@event')->name('juri.event');
    Route::get('/event/{event}',  'JuriController@eventShow')->name('juri.event.show');
    Route::put('/karya/{post}/point',  'PostController@updatePoint')->name('post.update.point');
});

Route::group(['middleware' => ['funners','phone']], function(){
    Route::get('/dashboar',  'FunnersController@index')->name('home.funner');
    Route::get('/karya/create',  'FunnersController@createPost')->name('funner.tambah.karya');
    Route::get('/post',  'FunnersController@post')->name('funner.post');
});


// Login Google
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback',  'Auth\LoginController@handleGoogleCallback');

// login facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback',  'Auth\LoginController@handleFacebookCallback');
