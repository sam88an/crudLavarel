<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Country;

class CountryController extends Controller
{
    //
    public function country()
    {
        return response()->json(Country::get(), 200);
    }
    public function countryByID($id)
    {
        return response()->json(Country::find($id), 200);
    }
    public function countrySave(Request $request)
    {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }
    public function countryUpdate(Request $request, Country $country)
    {
        $country->update($request->all());
        return response()->json($country, 200);
    }
    public function countryDelete(Request $request, Country $country)
    {
        $country->delete();
        return response()->json(null, 204);
    }
}
