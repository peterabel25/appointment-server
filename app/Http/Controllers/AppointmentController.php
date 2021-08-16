<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

  protected $appointmentModel;

  public function __construct()
  {
         $this-> appointmentModel=new Appointment();
  }



public function getAppointments()
{
 // function to get all the appointments

    return $this->appointmentModel->getAppointments();
}

public function getAppointment($appointmentId)
{
// getting  specific appointment

    return $this->appointmentModel->getAppointment($appointmentId);
}


public function deleteAppointment($appointmentId)
{
// deleting a specific appointment

    return $this->appointmentModel->deleteAppointment($appointmentId);
}



public function postAppointment(Request $request)
{

    return $this->appointmentModel->postAppointment($request);
}

public function putAppointment(Request $request,$appointmentId)
{

    return $this->appointmentModel->putAppointment($request, $appointmentId);
}


}
