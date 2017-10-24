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
        Route::get("/create", "ReportController@create")->name("report.create");
        Route::post("/save", "ReportController@save")->name("report.save");

        Route::middleware(["can:administrate"])->group(function() {
            Route::get("/", "ReportController@index")->name("report.index");
            Route::get("/image/{report}", "ReportController@image")->name("report.image");
            Route::get("/detail/{report}", "ReportController@detail")->name("report.detail");
        });
    });

    Route::prefix("permit")->group(function() {
        Route::get("/create", "PermitController@create")->name("permit.create");
        Route::post("/save", "PermitController@save")->name("permit.save");

        Route::middleware(["can:administrate"])->group(function() {
            Route::get("/", "PermitController@index")->name("permit.index");
            // Route::get("/image/{report}", "ReportController@image")->name("report.image");
            // Route::get("/detail/{report}", "ReportController@detail")->name("report.detail");
        });
    });

});

Route::middleware(["auth", "can:administrate"])->prefix("administrator")->group(function() {
    Route::get("/dashboard", "AdministratorController@dashboard")->name("admin.dashboard");
    Route::prefix("user")->group(function() {
        Route::get("/", "UserController@index")->name("user.index");
        Route::get("/{user}/identity_card", "UserController@identityCard")->name("user.identity_card");
        Route::get("/{user}/verify", "UserController@verify")->name("user.verify");
    });
});

Route::get("/unauthorized", function() {
    return view("error.unauthorized");
})->name("error.unauthorized");


Route::get("/test", function() { return "Dummy...."; })->middleware("auth");

