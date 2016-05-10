<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
			return view('front/fr');
});


Route::any('/chart',['uses' => 'Admin@chart']);

Route::get('Admin',['uses' => 'Admin@index']);
Route::get('Staff',['uses' => 'Staff@index']);
Route::get('Client',['uses' => 'Client@index']);
Route::get('Admin/try',['uses' => 'Admin@testEx']);


//Admin
// Get method
//Project
Route::get('Admin/proj/show',['uses' => 'Admin@showProj']);
Route::get('Admin/proj/listdoc',['uses' => 'Admin@listDoc']);
Route::get('Admin/proj/show/excel',['uses' => 'Admin@insertEx']);
Route::get('Admin/proj/insert',['uses' => 'Admin@createProj']);
Route::get('Admin/proj/{id}/edit',['uses' => 'Admin@editProject']);
Route::get('Admin/excel','Admin@toExcelProj');
Route::delete('Admin/proj/{id}',['uses' => 'Admin@deleteProject']);
Route::patch('Admin/proj/{id}',['uses' => 'Admin@updateProject']);
Route::post('Admin/proj/insert',['as' => 'post-project','uses' => 'Admin@storeProj']);
//User
Route::get('Admin/user/show',['uses' => 'Admin@showUser']);
Route::get('Admin/user/insert',['uses' => 'Admin@createUser']);
Route::get('Admin/user/{id}/edit',['uses' => 'Admin@editUser']);
Route::patch('Admin/user/{id}',['uses' => 'Authorization@updateUser']);
Route::delete('Admin/user/{id}',['uses' => 'Admin@deleteUser']);
Route::post('Admin/user/insert', ['as' => 'post-registrationusr', 'uses' => 'Admin@storeReg']);
//Witel
Route::get('Admin/witel/insert',['uses' => 'Admin@createWitel']);
Route::get('Admin/witel/show',['uses' => 'Admin@showWitel']);
Route::get('Admin/witel/{id}/edit',['uses' => 'Admin@editWitel']);
Route::delete('Admin/witel/{id}',['uses' => 'Admin@deleteWitel']);
Route::patch('Admin/witel/{id}',['uses' => 'Admin@deleteWitel']);
//Tender
Route::get('Admin/tender/insert',['uses' => 'Admin@createTender']);
Route::get('Admin/tender/show',['uses' => 'Admin@showTender']);
Route::get('Admin/tender/{id}/edit',['uses' => 'Admin@editTender']);
Route::delete('Admin/tender/{id}',['uses' => 'Admin@deleteTender']);
Route::post('Admin/tender/insert', ['as' => 'post-tender', 'uses' => 'Admin@storeTender']);
Route::patch('Admin/tender/{id}',['uses' => 'Admin@updateTender']);
//Alert
Route::delete('Admin/alert/{id}/{prid}',['uses' => 'Admin@deleteAlert']);
Route::get('Admin/alert/insert/{id}/{prid}',['uses' => 'Admin@insertAlert']);
//Excel
Route::get('Admin/agenda/excelAgen',['uses' => 'Admin@uploadExcelagen']);
Route::get('Admin/project/excelProj',['uses' => 'Admin@uploadExcelproj']);
Route::get('Admin/agenda/dlexagen',['uses' => 'Admin@toExagen']);
Route::get('Admin/project/dlexproj',['uses' => 'Admin@toExproj']);
Route::post('Admin/project/excelProj',['as' => 'post-exp','uses' => 'Admin@storeExcelproj']);
//Agenda
Route::get('Admin/agenda/insert/{id}',['uses' => 'Admin@insertAgenda']);
Route::get('Admin/agenda/show',['uses' => 'Admin@showList']);
Route::get('Admin/agenda/list',['uses' => 'Admin@showAgenda']);
Route::get('Admin/agenda/{idp}/{ida}/edit',['uses' => 'Admin@editAgenda']);
Route::patch('Admin/agenda/{id}',['uses' => 'Admin@updateAgenda']);
Route::get('Admin/agenda/uploadEx',['uses' => 'Admin@showAgenda']);
Route::delete('Admin/agenda/{id}',['uses' => 'Admin@deleteAgenda']);
Route::post('Admin/agenda/excelAgen',['as' => 'post-exag','uses' => 'Admin@storeExcelagen']);
Route::post('Admin/agenda/insert',['as' => 'post-agenda','uses' => 'Admin@storeAgenda']);
//Doc
Route::get('Admin/project/uploadocs/{id}',['uses' => 'Admin@insertDoc']);
Route::get('Admin/project/editdocs/{idpr}/{idp}',['uses' => 'Admin@editDoc']);
Route::get('Admin/project/edit/uploadocs/{id}',['uses' => 'Admin@insertAgenda']);
Route::patch('Admin/proj/editdocs/{id}',['uses' => 'Admin@updateDoc']);
Route::post('Admin/project/uploaddocs',['as' => 'post-doc','uses' => 'Admin@storeDoc']);
//Staff
// Get method
//Project
Route::get('Staff/proj/show',['uses' => 'Staff@showProj']);
Route::get('Staff/proj/show/excel',['uses' => 'Staff@insertEx']);
Route::get('Staff/proj/insert',['uses' => 'Staff@createProj']);
Route::get('Staff/proj/{id}/edit',['uses' => 'Staff@editProject']);
Route::delete('Staff/proj/{id}',['uses' => 'Staff@deleteProject']);
Route::post('Staff/project/insert',['as' => 'post-docst','uses' => 'Staff@storeDoc']);
Route::patch('Staff/proj/{id}',['uses' => 'Staff@updateProject']);
//Witel
Route::get('Staff/witel/insert',['uses' => 'Staff@createWitel']);
Route::post('Staff/witel/insert',['as' => 'post-witel','uses' => 'Staff@storeWitel']);
Route::get('Staff/witel/show',['uses' => 'Staff@showWitel']);
Route::get('Staff/witel/{id}/edit',['uses' => 'Staff@editWitel']);
Route::delete('Staff/witel/{id}',['uses' => 'Staff@deleteWitel']);
Route::patch('Staff/witel/{id}',['uses' => 'Staff@deleteWitel']);
//Tender
Route::get('Staff/tender/insert',['uses' => 'Staff@createTender']);
Route::get('Staff/tender/show',['uses' => 'Staff@showTender']);
Route::get('Staff/tender/{id}/edit',['uses' => 'Staff@editTender']);
Route::delete('Staff/tender/{id}',['uses' => 'Staff@deleteTender']);
Route::patch('Staff/tender/{id}',['uses' => 'Staff@updateTender']);
//Alert
Route::delete('Staff/alert/{id}/{prid}',['uses' => 'Staff@deleteAlert']);
Route::get('Staff/alert/insert/{id}/{prid}',['uses' => 'Staff@insertAlert']);
//Excel
Route::get('Staff/agenda/excelAgen',['uses' => 'Staff@uploadExcelagen']);
Route::get('Staff/project/excelProj',['uses' => 'Staff@uploadExcelproj']);
Route::get('Staff/agenda/dlexagen',['uses' => 'Staff@toExagen']);
Route::get('Staff/project/dlexproj',['uses' => 'Staff@toExproj']);
//Agenda
Route::get('Staff/agenda/insert/{id}',['uses' => 'Staff@insertAgenda']);
Route::get('Staff/agenda/show',['uses' => 'Staff@showList']);
Route::get('Staff/agenda/list',['uses' => 'Staff@showAgenda']);
Route::get('Staff/agenda/{idp}/{ida}/edit',['uses' => 'Staff@editAgenda']);
Route::patch('Staff/agenda/{id}',['uses' => 'Staff@updateAgenda']);
Route::get('Staff/agenda/uploadEx',['uses' => 'Staff@showAgenda']);
Route::delete('Staff/agenda/{id}',['uses' => 'Staff@deleteAgenda']);
//Doc
Route::get('Staff/project/uploadocs/{id}',['uses' => 'Staff@insertDoc']);
Route::get('Staff/project/edit/uploadocs/{id}',['uses' => 'Staff@insertAgenda']);
Route::patch('Staff/proj/editdocs/{id}',['uses' => 'Staff@updateDoc']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Client
// Get method
//Project
Route::get('Staff/proj/show',['uses' => 'Staff@showProj']);
Route::get('Staff/proj/show/excel',['uses' => 'Staff@insertEx']);
Route::get('Staff/proj/insert',['uses' => 'Staff@createProj']);
Route::get('Staff/proj/{id}/edit',['uses' => 'Staff@editProject']);
Route::delete('Staff/proj/{id}',['uses' => 'Staff@deleteProject']);
Route::post('Staff/project/insert',['as' => 'post-docst','uses' => 'Staff@storeDoc']);
Route::patch('Staff/proj/{id}',['uses' => 'Staff@updateProject']);
//Witel
Route::get('Staff/witel/insert',['uses' => 'Staff@createWitel']);
Route::post('Staff/witel/insert',['as' => 'post-witel','uses' => 'Staff@storeWitel']);
Route::get('Staff/witel/show',['uses' => 'Staff@showWitel']);
Route::get('Staff/witel/{id}/edit',['uses' => 'Staff@editWitel']);
Route::delete('Staff/witel/{id}',['uses' => 'Staff@deleteWitel']);
Route::patch('Staff/witel/{id}',['uses' => 'Staff@deleteWitel']);
//Tender

//Post Method
Route::get('laporan/pdf','LaporanCont@pdf');
Route::get('/register', ['as' => 'register', 'uses' => 'Authorization@register']);
Route::post('/register', ['as' => 'post-registration', 'uses' => 'Authorization@doRegister']);
Route::post('/login',['as' => 'login','uses' => 'Authorization@login']);
Route::get('/login', ['as' => 'login', 'uses' => 'Authorization@getLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Authorization@logout']);