<?php

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

Route::get('/', 'IndexController@index');
// Route::get('auth', function () {
//     $credentials = [
//         'email'    => 'zziller03@gmail.com',
//         'password' => 'paper0817'
//     ];
//
//     if (! Auth::attempt($credentials)) {
//         return 'Incorrect username and password combination';
//     }
//
//     return redirect('protected2');
// });
//
// Route::get('auth/logout', function () {
//     Auth::logout();
//
//     return 'See you again~';
// });
//
// Route::get('protected', function () {
//     if (! Auth::check()) {
//         return 'Illegal access !!! Get out of here~';
//     }
//
//     return 'Welcome back, ' . Auth::user()->name . ' (' . Auth::user()->email . ')';
// });
//
// Route::get('protected2', [
//     'middleware' => 'auth',
//     function () {
//         return 'Welcome back, ' . Auth::user()->name;
//     }
// ]);
// Route::get('auth/login',function(){
//         $credentials =[
//                 'email' => 'zziller03@gmail.com',
//                 'password' => 'paper0817'
//         ];
//         if(!auth()->attempt($credentials)){
//                 return 'login fail';
//         }
//         return redirect('protected');
// });
//
// Route::get('protected',function(){
//         dump(Auth::check());
//         if(!Auth::check()){
//                 return 'nuguseyo!!';
//         }
//         echo Auth::check() . '<br>';
//         return 'Welcome '.auth()->user()->name;
// });
//
// Route::get('auth/logout',function(){
//         auth()->logout();
//         return 'see you again';
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
