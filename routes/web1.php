<?php

use App\Models\Question;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    // $questions = Question::with('options')
    // ->orderByRaw("RAND()")
    // ->limit(5)->get(); //get();
    // dd($questions);
    // return view('welcome');
    return view('welcome');
});


// Ruta  profile
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

//Route concurso2023

Route::get('/lanzar-admin', function () {

    $params = [
        'username' => '20293671142',
        'cargo_ui' => null,
        'rol' => 'ROLE_ADMIN',
    ];

    //urldecode('%%BDL%%D842%%DEQ%%89S%%84%%96%%AF%%0C%%7C%%87U');

    $iv = "1234567891234567";

    $secret = "smuzEjE9Za";
    $cipher =  "aes-128-cbc";

    $textjson = json_encode($params);
    //dd($textjson);
    $code_crypt = openssl_encrypt($textjson, $cipher, $secret, $options = 0, $iv);

    $code = urlencode(urlencode($code_crypt));

    //return redirect('https://examen2023-prueba.chaco.gob.ar/login-for-hash/'.$code);
    return redirect('http://examen_curso.test/login-for-hash/'.$code);
})->name('lanzar.admin');

Route::get('/lanzar-exam-admin', function () {

    $params = [
        'username' => '23149327614',
        'cargo_ui' => 'e6d69674c3bd7525e6e1ed8c68f95b84',
        'rol' => 'ROLE_ASPIRANTE',
    ];

    $iv = "1234567891234567";

    $secret = "smuzEjE9Za";
    $cipher =  "aes-128-cbc";

    $textjson = json_encode($params);

    $code_crypt = openssl_encrypt($textjson, $cipher, $secret, $options = 0, $iv);


    $code = urlencode(urlencode($code_crypt));

    return redirect('http://examen_curso.test/login-for-hash/'.$code);

})->name('lanzar.exam.admin');
//-- fin --

Route::get('/lanzar-exam-tec', function () {

    $params = [
        'username' => '23149327614',
        'cargo_ui' => 'e6d69674c3bd7525e6e1ed8c68f95b85',
        'rol' => 'ROLE_ASPIRANTE',
    ];

    $iv = "1234567891234567";

    $secret = "smuzEjE9Za";
    $cipher =  "aes-128-cbc";

    $textjson = json_encode($params);
    //dd($textjson);
    $code_crypt = openssl_encrypt($textjson, $cipher, $secret, $options = 0, $iv);


    $code = urlencode(urlencode($code_crypt));

    return redirect('http://examen_curso.test/login-for-hash/'.$code);

})->name('lanzar.exam.tec');

Route::get('/lanzar-exam-maes', function () {

    $params = [
        'username' => '23149327614',
        'rol' => 'ROLE_ASPIRANTE',
        'cargo_ui' => 'a397b71e-468e-4688-b5f7-fbc8b6231990',
    ];

    $iv = "1234567891234567";

    $secret = "smuzEjE9Za";
    $cipher =  "aes-128-cbc";

    $textjson = json_encode($params);
    //dd($textjson);
    $code_crypt = openssl_encrypt($textjson, $cipher, $secret, $options = 0, $iv);


    $code = urlencode(urlencode($code_crypt));

    return redirect('http://examen_curso.test/login-for-hash/'.$code);
    // return redirect('https://examen2023-prueba.chaco.gob.ar/login-for-hash/'.$code);

})->name('lanzar.exam.maes');

