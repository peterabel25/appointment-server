<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Payment extends Model
{
    protected $fillable=['status_disbursement','appointment_id'];
    protected $dates=['deleted_at','created_at',];
    use HasFactory,softDeletes;

//relations
 public function appointment(){

    return $this->belongsTo(payment::class);
 }



 //FUNCTIONS/METHODS

 public function getPayments()
 {
     $payments = Payment::all();
     return response()->json(['payments' => $payments], 200);
 }

 public function getPayment($paymentId)
 {
     $payment=Payment::find($paymentId);
     if(!$payment)
     return response()->json(['error'=>'payment not found'],404);


     return response()->json(['payment'=>$payment],200);
 }

 public function deletePayment($paymentId){ 
     $payment=Payment::find($paymentId);
     if(!$payment)
     return response()->json(['error'=>'payment not found'],404);


     $payment->delete();
     return response()->json(['message'=>'payment deleted successfully'],201);

 }


 public function postPayment(Request $request)
 {
     // taking the requests and validating(requsts,user defined rules)
     $validator = Validator::make($request->all(), [
         'status_disbursement' => 'required',
         'appointment_id'=>'required|unique:payments',
         
     ]);

     if ($validator->fails()) {
         return response()->json(['error' => $validator->errors()]);
     }

     //creating an payment
     
     
     $appointment = Appointment::find($request->appointment_id);
     if(!$appointment)
      return response()->json(['error'=>'appointment does not exist']);
     
     
     
     
     
     
     $payment=new Payment();
     $payment->status_disbursement=$request->status_disbursement;
     
     
     //way to save using eloquent relations
     $appointment->payment()->save($payment);
     $appointment->payment;
     
     return response()->json(['appointment'=>$appointment]);

     
     
     
     /*$payment = Payment::create(
         [
             'status_disbursement' => $request->status_disbursement,
             'appointment'=>$request->appointment_id,
         ]
     );
     return response()->json(['payment' => $payment], 201);
     */
 }




 public function putPayment(Request $request, $paymentId)
 {
     $payment = Payment::find($paymentId);
     if (!$payment)
         return response()->json(['error' => 'payment not found'], 404);
     $payment->update ([
        
        'status_disbursement' => $request->status_disbursement,
'appointment_id'=>$request->appointment_id,

     ]);



     return response()->json(['payment' => $payment], 201);
 }

}
