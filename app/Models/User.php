<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = ['phonenumber', 'username', 'email', 'password',];
    protected $dates = ['deleted_at', 'created_at',];

    //relations

    public function mother()
    {
        return $this->hasOne(Mother::class);
    }


    public function midwife()
    {
        return $this->hasOne(Midwife::class);
    }


    //FUNCTIONS/METHODS

    public function getUsers()
    {
        $users = User::all();
        
        return response()->json(['users' => $users], 200);
    }

    public function getUser($userId)
    {
        $user = User::find($userId);
        if (!$user)
            return response()->json(['error' => 'user not found'], 404);
   $user->midwife;

        return response()->json(['user' => $user], 200);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if (!$user)
            return response()->json(['error' => 'user not found'], 404);


        $user->delete();
        return response()->json(['message' => 'user deleted successfully'], 201);
    }


   /* public function postUser(Request $request)
    {
        // taking the requests and validating(requsts,user defined rules)
        $validator = Validator::make($request->all(), [
            'phonenumber' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',

            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        //creating a user
        $user = User::create(
            [
                'phonenumber' => $request->phonenumber,
                'username' => $request->username,
                'email' => $request->email,


                'password' => $request->password,


            ]
        );
        return response()->json(['user' => $user], 201);
    }
*/



    public function putUser(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user)
            return response()->json(['error' => 'user not found'], 404);
        $user->update([

            'phonenumber' => $request->phonenumber,
            'username' => $request->username,
            'email' => $request->email,


            'password' => $request->password,



        ]);



        return response()->json(['user' => $user], 201);
    }


    public function register(Request $request)
    {
        // taking the requests and validating(requsts,user defined rules)
        $validator = Validator::make($request->all(), [
            'phonenumber' => 'unique:users',
            'username' => 'required',
            'email' => 'email|unique:users',

            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        //creating a user
        $user = User::create(
            [
                'phonenumber' => $request->phonenumber,
                'username' => $request->username,
                'email' => $request->email,


                'password' => Hash::make($request->password),


            ]
        );
        return response()->json(['user' => $user], 201);
    }
}
