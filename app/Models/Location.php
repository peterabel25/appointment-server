<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Location extends Model
{
    protected $fillable = [ 'physical_address', 'longitude', 'latitude', 'user_id'];
    use HasFactory,SoftDeletes;

    //FUNCTIONS/METHODS

    public function getLocations()
    {
        $locations = Location::all();
        return response()->json(['locations' => $locations], 200);
    }

    public function getLocation($locationId)
    {
        $location = Location::find($locationId);
        if (!$location)
            return response()->json(['error' => 'location not found'], 404);


        return response()->json(['location' => $location], 200);
    }

    public function deleteLocation($locationId)
    {
        $location = Location::find($locationId);
        if (!$location)
            return response()->json(['error' => 'location not found'], 404);


        $location->delete();
        return response()->json(['message' => 'location deleted successfully'], 201);
    }


    //CREATING AN LOcation,REQUEST IS LIKE TAKING THE USER INPUTS
    //POST BECAUSE WE WANT TO CREATE A NEW DATA ON DB
    public function postLocation(Request $request)
    {
        // taking the requests and validating(requsts,user defined rules)
        $validator = Validator::make($request->all(), [
           
            'physical_address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            
            'user_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        //creating a location
        $location = Location::create(
            [
               
                'physical_address' => $request->location,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
               
                'user_id' => $request->user_id,

            ]
        );
        return response()->json(['location' => $location], 201);
    }




    public function putLocation(Request $request, $locationId)
    {
        $location = Location::find($locationId);
        if (!$location)
            return response()->json(['error' => 'location not found'], 404);
        $location->update ([
           
            'physical_location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
          
            'user_id' => $request->user_id,
        ]);



        return response()->json(['location' => $location], 201);
    }
}

