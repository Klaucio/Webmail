<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//use Illuminate\Http\Request;
//Route::get('webmail', function () {
//    $mensagens = App\Mensagens::all();
//    return view('index')->with('mensagens',$mensagens);
//});
//Route::get('webmail/{mensagem_id?}',function($id){
//    $mensagem = App\Mensagens::find($id);
//    return response()->json($mensagem);
//});
//Route::post('mensagemajaxCRUD',function(Request $request){
//    $mensagem = App\Mensagens::create($request->input());
//    return response()->json($mensagem);
//});
//Route::put('webmail/{mensagem_id?}',function(Request $request,$mensagem_id){
//    $mensagem = App\Product::find($mensagem_id);
//    $mensagem->user_id=$request->user_id;
//    $mensagem->assunto = $request->assunto;
//    $mensagem->mesagem = $request->mensagem;
//    $mensagem->save();
//    return response()->json($mensagem);
//});
//Route::delete('webmail/{mensagem_id?}',function($mensagem_id){
//    $mensagem = App\Mensagens::destroy($mensagem_id);
//    return response()->json($mensagem);
//});
//------------------------------

//Route::resource('product', 'ProductController');
Route::resource('mensagens', 'MensagensController');
Route::resource('inbox', 'InboxController');
Route::resource('sent', 'SentController');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
