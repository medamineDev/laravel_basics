<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\User;
use DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use  Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function get_users()
    {

        return $users = DB::table('users')->paginate(2);


    }


}
