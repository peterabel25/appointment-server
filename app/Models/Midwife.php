<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Midwife extends Model
{
    protected $fillable=['qualifications','working_status','user_id'];
    protected $dates=['deleted_at','created_at',];
    use HasFactory,softDeletes;

//relations
public function appointments(){
    return $this->hasMany(Appointment::class);
}

public function user(){
    return $this->belongsTo(User::class);
}

 //FUNCTIONS/METHODS

 public function getMidwives()
 {
     $midwives = Midwife::all();
     return response()->json(['midwives' => $midwives], 200);
 }

 public function getMidwife($midwifeId)
 {
     $midwife=Midwife::find($midwifeId);
     if(!$midwife)
     return response()->json(['error'=>'midwife not found'],404);


     return response()->json(['midwife'=>$midwife],200);
 }

 public function deleteMidwife($midwifeId){ 
     $midwife=Midwife::find($midwifeId);
     if(!$midwife)
     return response()->json(['error'=>'midwife not found'],404);


     $midwife->delete();
     return response()->json(['message'=>'midwife deleted successfully'],201);

 }

 public function postMidwife(Request $request)
 {
     // taking the requests and validating(requsts,user defined rules)
     $validator = Validator::make($request->all(), [
         'qualifications' => 'required',
         'working_status' => 'required',
         'user_id' => 'required|unique:midwives',
         
     ]);

     if ($validator->fails()) {
         return response()->json(['error' => $validator->errors()]);
     }







$user = User::find($request->user_id);
if(!$user)
 return response()->json(['error'=>'user does not exist']);






$midwife=new Midwife();
$midwife->qualifications=$request->qualifications;
$midwife->working_status=$request->working_status;

//way to save using eloquent relations
$user->midwife()->save($midwife);
$user->midwife;

return response()->json(['user'=>$user]);
     //creating a midwife
    /* $midwife = Midwife::create(
         [
             'qualifications' => $request->qualifications,
             'working_status' => $request->working_status,
             'user_id' => $request->user_id,
            
         ]
     );
     return response()->json(['midwife' => $midwife], 201);
     */
 }




 public function putMidwife(Request $request, $midwifeId)
 {
     $midwife = Midwife::find($midwifeId);
     if (!$midwife)
         return response()->json(['error' => 'midwife not found'], 404);
     $midwife->update ([

        
        'qualifications' => $request->qualifications,
        'working_status' => $request->working_status,
        'user_id' => $request->user_id,
       
        
     ]);



     return response()->json(['midwife' => $midwife], 201);
 }


}
