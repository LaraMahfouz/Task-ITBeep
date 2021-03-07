<?php

namespace App\Http\Controllers;

use App\Intrest;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        $intrest = intrest::all();
        $services = Service::all();
     

        return view('index', compact('services','intrest'));
    }

        public function store(Request $request)
        {
            $this->mail($request);
            $user = new User();
            $user->name =$request->input('name');
            $user->mobile =$request->input('mobile');
            $user->email =$request->input('email');
            $user->service1 =$request->input('service1');
            $user->service2 =$request->input('service2');
            $user->service3 =$request->input('service3');
            $user->intrest =$request->input('intrest');
            $user->save();


            return json_encode(array(
                "statusCode" => 200
            ));
        }

public function mail($request){

        $name = $request->input('name');
    $intrest = $request->input('intrest');
    if($request->input('service1') == 1){
        $body = "You are Chosen " . "service1" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service2') == 1){
        $body = "You are Chosen " . "service2" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service3') == 1){
        $body = "You are Chosen " . "service3" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service3') == 1 && $request->input('service2') == 1 && $request->input('service1') == 1 ){
        $body = "You are Chosen " . " service1,service2 and service3" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service3') == 1 && $request->input('service2') == 1){
        $body = "You are Chosen " . "service2 and service3" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service3') == 1 && $request->input('service1') == 1){
        $body = "You are Chosen " . "service1 and service3" . " your interest is " . "{$intrest}" ;
    }
    if($request->input('service2') == 1 && $request->input('service1') == 1){
        $body = "You are Chosen " . "service1 and service2" . " your interest is " . "{$intrest}" ;
    }
    $details = [
        'title' => "Hello {$name}",
        'body' => $body
    ];
    Mail::to($request->input('email'))->send(new \App\Mail\WelcomeMail($details));
}

}

