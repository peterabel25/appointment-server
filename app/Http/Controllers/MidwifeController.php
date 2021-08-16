<?php

namespace App\Http\Controllers;

use App\Models\Midwife;
use Illuminate\Http\Request;

class MidwifeController extends Controller
{
    //

    protected $midwifeModel;

  public function __construct()
  {
         $this-> midwifeModel=new Midwife();
  }



public function getMidwives()
{
 // function to get all the appointments

    return $this->midwifeModel->getMidwives();
}

public function getMidwife($midwifeId)
{
// getting  specific appointment

    return $this->midwifeModel->getMidwife($midwifeId);
}


public function deleteMidwife($midwifeId)
{
// deleting a specific appointment

    return $this->midwifeModel->deleteMidwife($midwifeId);
}

public function postMidwife(Request $request)
{

    return $this->midwifeModel->postMidwife($request);
}

public function putMidwife(Request $request,$midwifeId)
{

    return $this->midwifeModel->putMidwife($request, $midwifeId);
}
}
