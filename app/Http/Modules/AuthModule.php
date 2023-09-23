<?php 

namespace App\Http\Modules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use App\Http\Helper\ResponseBuilder;

class AuthModule{

    public static function loginAccount(array $request)
    {
         //Identify First the credentials
         $type = filter_var($request['identity'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

         $rules = [
             $type => 'required',
             'password' => 'required'
         ];
 
         $message = [
             'required' => Config::get('constants.login.required')
         ];
         
         $credentials = [
            $type => $request['identity'],
            'password' => $request['password']
         ];

         $request[$type] = $request['identity'];
 
         $validator = Validator::make($credentials, $rules, $message);
 
         if($validator->fails()){
             return ResponseBuilder::response(
                 http_response_code(200),
                 Config::get('constants.status.fail'),
                 ['data' => $validator->messages()->get("*")]
                );
         }
    
         if(Auth::attempt($credentials))
         {
             $user = Auth::user();
 
             /** @var \App\Models\User|null $user */
             $data['token'] = $user->createToken("MyADMINApp")->plainTextToken;
             $data['name'] = $user->name;
 
             return ResponseBuilder::response(
                 http_response_code(200),
                Config::get('constants.status.success'),
                [
                    'title' => Config::get('constants.login.success.title'),
                    'message' => Config::get('constants.login.success.message'), 
                    'data' => $data
                ]);
         }
         else
             return ResponseBuilder::response(
                 http_response_code(200),
                 Config::get('constants.status.fail'),
                 [
                    'title' => Config::get('constants.login.fail.title'),
                    'message' => Config::get('constants.login.fail.message')
                ]);
    }

}

?>