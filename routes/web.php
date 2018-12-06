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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/pdfController","pdfController@make");
Route::get("danny/{id?}",function($id= null){
    echo $id;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/scola",[
    "as"=>"scola",
    "uses"=>"DannyController@index",
]);

// Route::group(["middleware"=>["web"]],function(){
//     Route::group(["prefix"=>"ngungath"],function(){
       
//         Route::get("scola",function(){
//             echo "My Wife";
//     });

//     Route::get("saitoti",function(){
//         echo "Mdogo wangu";
//     });

//     Route::get("/redirect",function(){
//         return redirect()->route("landing");

//     });

//      Route::get("/landing/page",function(){
//         echo "landing Page";
//     })->name("landing");
        
//     });
// });
Route::get("/projects/createPdf","ProjectsController@createPdf");

Route::middleware(["auth"])->group(function() {
Route::resource("companies","CompaniesController");
Route::resource("tasks","TasksController");
Route::resource("roles","RolesController");
Route::get("projects/create/{company_id?}","ProjectsController@create");
Route::post("projects/adduser","ProjectsController@adduser")->name("projects.adduser");
Route::resource("projects","ProjectsController");
Route::resource("users","UsersController");	
Route::resource("comments","CommentsController");
});

