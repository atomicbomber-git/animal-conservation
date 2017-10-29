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

Auth::routes();

Route::get("/", "MainController@index")->name("main");

Route::middleware(["auth"])->group(function() {
    Route::prefix("report")->group(function() {
        Route::middleware(["can:submit-permit-proposal"])->group(function() {
            Route::get("/create", "ReportController@create")->name("report.create");
            Route::post("/save", "ReportController@save")->name("report.save");
        });
        
        Route::middleware(["can:administrate"])->group(function() {
            Route::get("/", "ReportController@index")->name("report.index");
            Route::get("/image/{report}", "ReportController@image")->name("report.image");
            Route::get("/detail/{report}", "ReportController@detail")->name("report.detail");
        });
    });

    Route::prefix("permit")->group(function() {
        
        Route::middleware(["can:submit-permit-proposal"])->group(function() {
            Route::get("/create", "PermitController@create")->name("permit.create");
            Route::post("/save", "PermitController@save")->name("permit.save");
        });

        Route::middleware(["can:administrate"])->group(function() {
            Route::get("/", "PermitController@index")->name("permit.index");
            Route::get("/{permit}/proposal", "PermitController@proposal")->name("permit.proposal");
            Route::get("/{permit}/mother", "PermitController@mother")->name("permit.mother");
            Route::get("/{permit}/mother/certificate-image", "PermitController@motherCertificateImage")->name("permit.mother-cert-image");
            Route::get("/{permit}/father", "PermitController@father")->name("permit.father");
            Route::get("/{permit}/father/certificate-image", "PermitController@fatherCertificateImage")->name("permit.father-cert-image");
            Route::get("/{permit}/reference", "PermitController@reference")->name("permit.reference");
        });
    });

    Route::prefix("user")->group(function() {
        Route::middleware(["can:update-account-settings"])->group(function() {
            Route::get("/{user}/edit", "UserController@edit")->name("user.edit");
            Route::post("/{user}", "UserController@update")->name("user.update");
            Route::post("/{user}/updatePassword", "UserController@updatePassword")->name("user.updatePassword");
        });

        Route::middleware(["can:administrate"])->group(function() {
            Route::get("/", "UserController@index")->name("user.index");
            Route::get("/{user}/identity_card", "UserController@identityCard")->name("user.identity_card");
            Route::get("/{user}/verify", "UserController@verify")->name("user.verify");
        });
    });

    Route::prefix("law")->group(function() {
        Route::middleware("can:administrate")->group(function() {
            Route::get("/", "LawController@index")->name("law.index");
            Route::get("/create", "LawController@create")->name("law.create");
            Route::post("/save", "LawController@save")->name("law.save");
            Route::post("/{law}/delete", "LawController@delete")->name("law.delete");
        });
    });

    Route::prefix("information")->group(function() {
        Route::middleware("can:administrate")->group(function() {
            Route::get("/", "InformationController@index")->name("information.index");
            Route::get("/create", "InformationController@create")->name("information.create");
            Route::post("/save", "InformationController@save")->name("information.save");
            Route::post("/{information}/delete", "InformationController@delete")->name("information.delete");
            Route::get("/{information}/edit", "InformationController@edit")->name("information.edit");
            Route::post("/{information}/update", "InformationController@update")->name("information.update");
        });
    });

    Route::middleware(["can:administrate"])->prefix("administrator")->group(function() {
        Route::get("/dashboard", "AdministratorController@dashboard")->name("admin.dashboard");

        Route::prefix("map")->group(function() {
            Route::get("/manage", "MapController@admin")->name("map.admin");
            Route::post("/location/create", "MapController@addLocation")->name("map.addLocation");
            Route::get("/location/{location}/edit", "MapController@editLocation")->name("map.location.edit");
            Route::post("/location/{location}/update", "MapController@updateLocation")->name("map.location.update");
            Route::post("/location/{location}/delete", "MapController@deleteLocation")->name("map.location.delete");
        });
    });
});

Route::get("/law/document/{law}", "LawController@download")->name("law.download");
Route::get("/information/{information}/image", "InformationController@image")->name("information.image");
Route::get("/information/{information}/thumbnail", "InformationController@thumbnail")->name("information.thumbnail");
Route::get("/information/{information}/detail", "InformationController@detail")->name("information.detail");
Route::get("/articles", "InformationController@all")->name("information.all");

Route::get("/map/location/{location}", "MapController@detail")->name("map.location.detail");
Route::get("/map/locations", "MapController@locations")->name("map.locations");
Route::get("/map/location/{location}/image", "MapController@locationImage")->name("map.location.image");
Route::get("/map", "MapController@index")->name("map.index");


Route::redirect("/administrator", "/administrator/dashboard", 301);

Route::get("/unauthorized", function() {
    return view("error.unauthorized");
})->name("error.unauthorized");