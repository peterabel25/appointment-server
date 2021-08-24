<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    protected $locationModel;

    public function __construct()
    {
           $this-> locationModel=new Location();
    }
  
  
  
  public function getLocations()
  {
   // function to get all the locationss
  
      return $this->locationModel->getLocations();
  }
  
  public function getLocation($locationId)
  {
  // getting  specific appointment
  
      return $this->locationModel->getLocation($locationId);
  }
  
  
  public function deleteLocation($locationId)
  {
  // deleting a specific appointment
  
      return $this->locationModel->deleteLocation($locationId);
  }
  
  
  
  public function postLocation(Request $request)
  {
  
      return $this->locationModel->postLocation($request);
  }
  
  public function putLocation(Request $request,$locationId)
  {
  
      return $this->locationModel->putLocation($request, $locationId);
  }
}
