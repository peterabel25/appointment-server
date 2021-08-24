<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Booking extends Model
{
    protected $fillable = ['mother_id','appointment_id'];
    protected $dates=['created at','deleted at'];
    use HasFactory,SoftDeletes;

// relations

public function mother(){
    return $this->belongsTo(Mother::class);
}


// functions

public function postBooking(Request $request){
$validator=Validator::make($request->all(),[
    'mother_id'=>'required',
    'appointment_id'=>'required'
]);

if($validator->fails()){
    return response()->json(['error'=>$validator->errors()]);

}





$appointment=Appointment::find($request->appointment_id);
if(!$appointment)
return response()->json(['error'=>'appointment does not exist']);

$mother=Mother::find($request->mother_id);
if(!$mother)
return response()->json(['error'=>'mother does not exist']);





$booking=new Booking();
$booking->appointment_id=$request->appointment_id;

// saving a relation
$mother->bookings()->save($mother);
$mother->bookings;

return response()->json(['mother'=>$mother]);









}
}