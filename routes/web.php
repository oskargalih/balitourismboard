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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Panel Routes
 */
Route::middleware("auth")->prefix("panel")->group(function (){
	Route::get("/", "PanelController@index")->name("panelIndex");

	Route::get("/city/list", "PanelController@cityList")->name("panelCityList");
	Route::get("/city/new", "PanelController@cityNew")->name("panelCityNew");
	Route::get("/city/edit/{id}", "PanelController@cityEdit")->name("panelCityEdit");
	Route::post("/city/edit/{id}/action", "PanelController@cityAction")->name("panelCityEditAction");
	Route::post("/city/new/action", "PanelController@cityAction")->name("panelCityNewAction");
	Route::get("/city/delete/{id}", "PanelController@cityAction")->name("panelCityDeleteAction");

	Route::get("/discovery/list", "PanelController@discoveryList")->name("panelDiscoveryList");
	Route::get("/discovery/new", "PanelController@discoveryNew")->name("panelDiscoveryNew");
	Route::get("/discovery/edit/{id}", "PanelController@discoveryEdit")->name("panelDiscoveryEdit");
	Route::post("/discovery/edit/{id}/action", "PanelController@discoveryAction")->name("panelDiscoveryEditAction");
	Route::post("/discovery/new/action", "PanelController@discoveryAction")->name("panelDiscoveryNewAction");
	Route::get("/discovery/delete/{id}", "PanelController@discoveryAction")->name("panelDiscoveryDeleteAction");

	Route::get("/service/list", "PanelController@serviceList")->name("panelServiceList");
	Route::get("/service/new", "PanelController@serviceNew")->name("panelServiceNew");
	Route::get("/service/edit/{id}", "PanelController@serviceEdit")->name("panelServiceEdit");
	Route::post("/service/edit/{id}/action", "PanelController@serviceAction")->name("panelServiceEditAction");
	Route::post("/service/new/action", "PanelController@serviceAction")->name("panelServiceNewAction");
	Route::get("/service/delete/{id}", "PanelController@serviceAction")->name("panelServiceDeleteAction");

	Route::get("/traveler/list", "PanelController@travelerList")->name("panelTravelerList");
	Route::get("/traveler/new", "PanelController@travelerNew")->name("panelTravelerNew");
	Route::get("/traveler/edit/{id}", "PanelController@travelerEdit")->name("panelTravelerEdit");
	Route::post("/traveler/edit/{id}/action", "PanelController@travelerAction")->name("panelTravelerEditAction");
	Route::post("/traveler/new/action", "PanelController@travelerAction")->name("panelTravelerNewAction");
	Route::get("/traveler/delete/{id}", "PanelController@travelerAction")->name("panelTravelerDeleteAction");

	Route::get("/trip/list", "PanelController@tripList")->name("panelTripList");
	Route::get("/trip/new", "PanelController@tripNew")->name("panelTripNew");
	Route::get("/trip/edit/{id}", "PanelController@tripEdit")->name("panelTripEdit");
	Route::post("/trip/edit/{id}/action", "PanelController@tripAction")->name("panelTripEditAction");
	Route::post("/trip/new/action", "PanelController@tripAction")->name("panelTripNewAction");
	Route::get("/trip/delete/{id}", "PanelController@tripAction")->name("panelTripDeleteAction");
});
