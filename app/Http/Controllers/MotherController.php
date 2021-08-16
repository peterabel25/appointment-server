<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use Illuminate\Http\Request;

class MotherController extends Controller
{
    //

    protected $motherModel;

    public function __construct()
    {
           $this-> motherModel=new Mother();
    }
  
  
  
  public function getMothers()
  {
   // function to get all the appointments
  
      return $this->motherModel->getMothers();
  }
  
  public function getMother($motherId)
  {
  // getting  specific appointment
  
      return $this->motherModel->getMother($motherId);
  }
  
  
  public function deleteMother($motherId)
  {
  // deleting a specific appointment
  
      return $this->motherModel->deleteMother($motherId);
  }

  public function postMother(Request $request)
  {
  
      return $this->motherModel->postMother($request);
  }
  
  public function putMother(Request $request,$motherId)
  {
  
      return $this->motherModel->putMother($request, $motherId);
  }


}



