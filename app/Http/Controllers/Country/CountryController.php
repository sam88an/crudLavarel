<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    //
    public function country()
    {
        return response()->json(Country::get(), 200);
    }
    public function countryByID($id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(["message" => "Record not found..."], 400);
        } else
            return response()->json(Country::find($id), 200);
    }
    public function countrySave(Request $request)
    {
        $rules = [
            "name" => 'required|min:3',
            "iso" => "required|min:2|max:2"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }
    public function countryUpdate(Request $request, $id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(["message" => "Record not found..."], 400);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }
    public function countryDelete(Request $request, $id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(["message" => "Record not found..."], 400);
        }
        $country->delete();
        return response()->json(["message" => "Delete success...."], 200);
    }
}
