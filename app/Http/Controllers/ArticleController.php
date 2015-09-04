<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
//use App\Http\Requests\UserFormRequest;


use \App\Article as Article;

class ArticleController extends Controller
{


    public function  add_art()
    {


        /*

        classic request

         $title = Input::get('titre', 'the title is empty');
          $price = Input::get('prix', 'the price is empty');



          $article = new Article();
          $article->title=$title;
          $article->price=$price;
          $article->save();

          return $title."----->Saved with success ! ";*/


        /* using ajax request */
        if (Request::ajax()) {
            $title = Input::get('titre', 'the title is empty');
            $price = Input::get('prix', 'the price is empty');


            $article = new Article();
            $article->title = $title;
            $article->price = doubleval($price);
            $article->save();


            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
                'saved_title' => $title,
                'saved_price' => $price
            );

            return Response::json($response);
        } else {


            return response()
                ->header('Content-Type', 'error')
                ->header('X-Header-One', 'Header Value')
                ->header('X-Header-Two', 'Header Value');



        }


    }

    public function index()
    {


        /*$articles = article::all();
        return view("articles",compact("articles"));*/


        $articles = Article::all();

        $one_art = article::find(1);

        // return view("articles", compact("articles"));


        return view("articles")->with([
            "articles" => $articles,
            "one_art" => $one_art

        ]);


    }

}

