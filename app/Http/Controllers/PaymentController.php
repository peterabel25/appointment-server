<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    protected $paymentModel;

    public function __construct()
    {
           $this-> paymentModel=new Payment();
    }
  
  
  
  public function getPayments()
  {
   // function to get all the appointments
  
      return $this->paymentModel->getPayments();
  }
  
  public function getPayment($paymentId)
  {
  // getting  specific appointment
  
      return $this->paymentModel->getPayment($paymentId);
  }
  
  
  public function deletePayment($paymentId)
  {
  // deleting a specific appointment
  
      return $this->paymentModel->deletePayment($paymentId);
  }

  public function postPayment(Request $request)
  {
  
      return $this->paymentModel->postPayment($request);
  }
  
  public function putPayment(Request $request,$paymentId)
  {
  
      return $this->paymentModel->putPayment($request, $paymentId);
  }
}
