<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\User;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function index()
    {

        return view('pages.home');


    }


    public function ajax_save_user()
    {


        $name = Input::get('name');
        $email = Input::get('email');
        $age = Input::get('age');


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->age = $age;
        $user->save();


        $response = array(

            "status" => "saved with success",
            "code" => 200

        );
        return Response::json($response);


    }


}
