<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Mother extends Model
{
    protected $fillable=['date_of_birth','gravida','user_id'];
    protected $dates=['date_of_birth','deleted_at','created_at',];
    use HasFactory,softDeletes;


    //relations
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

   public function user(){
       return $this->belongsTo(User::class);
   }


 //FUNCTIONS/METHODS

 public function getMothers()
 {
     $mothers = Mother::all();
     return response()->json(['mothers' => $mothers], 200);
 }

 public function getMother($motherId)
 {
     $mother=Mother::find($motherId);
     if(!$mother)
     return response()->json(['error'=>'mother not found'],404);


     return response()->json(['mother'=>$mother],200);
 }

 public function deleteMother($motherId){ 
     $mother=Mother::find($motherId);
     if(!$mother)
     return response()->json(['error'=>'mother not found'],404);


     $mother->delete();
     return response()->json(['message'=>'mother deleted successfully'],201);

 }

 public function postMother(Request $request)
 {
     // taking the requests and validating(requsts,user defined rules)
     $validator = Validator::make($request->all(), [
         'date_of_birth' => 'required',
         'gravida' => 'required',
         'user_id' => 'required',
         
     ]);

     if ($validator->fails()) {
         return response()->json(['error' => $validator->errors()]);
     }

     //creating a mother
     $mother = Mother::create(
         [
             'date_of_birth' => $request->date_of_birth,
             'gravida' => $request->gravida,
             'user_id' => $request->user_id,
            
         ]
     );
     return response()->json(['mother' => $mother], 201);
 }




 public function putMother(Request $request, $motherId)
 {
     $mother = Mother::find($motherId);
     if (!$mother)
         return response()->json(['error' => 'mother not found'], 404);
     $mother->update ([

        'date_of_birth' => $request->date_of_birth,
        'gravida' => $request->gravida,
        'user_id' => $request->user_id,
       
     ]);



     return response()->json(['mother' => $mother], 201);
 }


}
