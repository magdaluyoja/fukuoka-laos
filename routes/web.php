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

Route::get('/', 'PageController@getIndex');
Route::get('/greetings-and-overview', 'PageController@getGreeetingsAndOverview');
Route::get('/officers-list', 'PageController@getOfficersList');
Route::get('/members', 'PageController@getCompanyMembers');
Route::get('/business-plans', 'PageController@getBusinessPlans');
Route::get('/business-reports', 'PageController@getBusinessReports');
Route::get('/news', 'PageController@getNews');
Route::get('/contact-us', 'PageController@getContactUs');


Route::get('/business-plan/details/{id}', 'PageController@getBusinessPlansDetails')->name('business_plan_details');
Route::get('/business-report/details/{id}', 'PageController@getBusinessReportsDetails')->name('business_report_details');
Route::get('/news/details/{id}', 'PageController@getNewsDetails')->name('news_details');


Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::prefix('admin')->group(function () {
	    Route::resource('contents','NewContentController');
	});
    Route::get('/admin', 'AdminController@getDashboard')->name('admin');
	Route::get('/test', 'AdminController@getTestPage');
});

