<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $userModel;

    public function __construct()
    {
           $this-> userModel=new User();
    }
  
  
  
  public function getUsers()
  {
   // function to get all the appointments
  
      return $this->userModel->getUsers();
  }
  
  public function getUser($userId)
  {
  // getting  specific appointment
  
      return $this->userModel->getUser($userId);
  }
  
  
  public function deleteUser($userId)
  {
  // deleting a specific appointment
  
      return $this->userModel->deleteUser($userId);
  }


  public function postUser(Request $request)
  {
  
      return $this->userModel->postUser($request);
  }
  
  public function putUser(Request $request,$userId)
  {
  
      return $this->userModel->putUser($request, $userId);
  }


  public function register(Request $request){
   
    return $this->userModel->register($request);
  }
}

