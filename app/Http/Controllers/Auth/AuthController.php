<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use Input;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectPath = '/home';
    protected $loginPath = '/auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);

        // App::setLocale('fr');

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        Validator::extend('foo', function ($field, $value, $parameters) {

            return $value == 'foo@gmail.com';

        });


        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|foo|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function set_language($lang)
    {


        App::setLocale('fr');
        $response = array(
            'status' => 'success',
            'msg' => 'Settings has been changed successfully ---->' . $lang
        );

        return Response::json($response);


    }


    public function ajaxRegister()
    {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $userData = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('rpassword'),
        );
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        );
        $validator = Validator::make($userData, $rules);
        if ($validator->fails())
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            /*save password to show to user after registration*/
            $password = $userData['password'];
            /*hash it now*/
            $userData['password'] = Hash::make($userData['password']);
            unset($userData['password_confirmation']);
            /*save to DB user details*/
            if (User::create($userData)) {
                /*return success  message*/
                return Response::json(array(
                    'success' => true,
                    'email' => $userData['email'],
                    'password' => $password
                ));
            }
        }
    }


    public function ajaxLogin()
    {


        $validator = Validator::make(Input::all(),
            array(
                'email' => 'required|email',
                'password' => 'required'
            )
        );

        if ($validator->fails()) {
            return Response::json([
                'error' => 0,
                'msg' => $validator->errors()->first()
            ]);

        } else {
            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ));

            if ($auth) {

                return Response::json([
                    'error' => 0,
                    'path' => "/home"
                ]);


            } else {

                return response('Error')
                    ->header('Content-Type', 'Email or password is wrong')
                    ->header('Error_Code', '403');


                /*return Response::json([
                    'error' => 1,
                    'msg' => 'Email or password is wrong.'
                ]);*/

            }
        }

        return Response::json([
            'error' => 1,
            'msg' => 'Sorry, your request could not be proceeded.'
        ]);


    }


    public function getLogin()
    {
        return view('auth.login');
    }


    public function getRegister()
    {
        return view('auth.register');
    }


    public function getLogout()
    {

        Auth::logout();
        return redirect('auth/login');

    }


}
