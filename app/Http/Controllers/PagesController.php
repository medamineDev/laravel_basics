<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about()
    {


        $mayname = "Grine med amine";
        $poste = "Web dev";


        $skills = ["Linux-ubunto", "laravel", "AngularJS", "NodeJS", "Html5-Css3"];
        $data = [];
        $data['nom'] = $mayname;
        $data['poste'] = $poste;


        return view("about")->with([
            "nom" => $mayname,
            "poste" => $poste,
            "skills" => $skills
        ]);


    }
}
