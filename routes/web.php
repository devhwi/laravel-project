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

use App\Exceptions\CustomException;
use Illuminate\Auth\AuthenticationException;

// Route::get('/', 'IndexController@index');
Route::get('/', function() {
  return view('welcome');
});
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

Route::get('auth', function () {
    $credentials = [
        'email'    => 'zziller03@gmail.com',
        'password' => 'password'
    ];

    if (! Auth::attempt($credentials)) {
        return 'Incorrect username and password combination';
    }

    Event::fire('user.login', [Auth::user()]);

    var_dump('Event fired and continue to next line...');

    return;
});

Event::listen('user.login', function($user) {
    // var_dump('"user.log" event catched and passed data is:');
    // var_dump($user->toArray());
    $user->last_login = (new DateTime)->format('Y-m-d H:i:s');

    return $user->save();
});

// 유효성 검사 예시(웹)
Route::post('posts', function(\Illuminate\Http\Request $request) {
    $rule = [
        'title' => ['required'], // == 'title' => 'required'
        'body' => ['required', 'min:10'] // == 'body' => 'required|min:10'
    ];

    $validator = Validator::make($request->all(), $rule);

    if ($validator->fails()) {
        return redirect('posts/create')->withErrors($validator)->withInput();
    }

    // validation success
    return 'Valid & proceed to next job ~';
});

Route::get('posts/create', function() {
    return view('posts.create');
});

Route::get('/error', function() {
    // throw new Exception('Some bad thing happened');
    // abort(404);
    return App\Post::findOrFail(100);
});

Route::get('/customError', function() {
  $message = [
    'Success' => true,
    'Message' => 'Custom Exception Test'
  ];

  // 강제 예외 발생
  // throw new CustomException('Some Exception!!!!!');
  throw new AuthenticationException();

  return response()->json($message);
});

Route::get('page', function() {
    $posts = App\Post::with('user')->paginate(2);

    return view('posts', compact('posts'));
});