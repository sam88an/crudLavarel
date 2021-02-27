<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('country', 'Country\CountryController@country');
Route::get('country/{id}', 'Country\CountryController@countryByID');
Route::post('country', 'Country\CountryController@countrySave');
Route::put('country/{country}', 'Country\CountryController@countryUpdate');
Route::delete('country/{country}', 'Country\CountryController@countryDelete');