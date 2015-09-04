<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redirect;
use URL;
use Cookie;
use App;

class LocaleController extends Controller {

    public function setLocale($locale = 'en')
    {

        Cookie::queue('locale', $locale);
        App::setLocale($locale);
        $response = array(
            'status' => 'success',
            'msg' => 'Settings has been changed successfully ---->'.$locale
        );

        return Response::json($response);

    }
}