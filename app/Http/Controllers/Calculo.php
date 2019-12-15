<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Calculo extends Controller{
    public function calcular(Request $request){
        $req = $request->json()->all();
        $calculo = 0;
        $num = $req[0];
        $memoria = "";
        for($i = 0; $i < count($req); $i++){
            if (is_numeric($req[$i])){
                $num = $req[$i];
                switch($memoria){
                    case "+": 
                        $calculo = $calculo + $num; 
                    break;
                    case "-": 
                        $calculo = $calculo - $num; 
                    break;
                    case "x": 
                        $calculo = $calculo * $num; 
                    break;
                    case "/": 
                        $calculo = $calculo / $num; 
                    break;
                    default:
                        $calculo = $num;
                    break;
                }
                $memoria = "";
            } else { $memoria = $req[$i]; }
        }     
        return $calculo;
    }
    public function porcentagem(Request $request){
        $req = $request->json()->all();
        $calculo = 0;
        $num = $req[0];
        $memoria = "";
        for($i = 0; $i < count($req); $i++){
            if (is_numeric($req[$i])){
                $num = $req[$i];
                switch($memoria){
                    case "+": 
                        $calculo = $calculo + $num; 
                    break;
                    case "-": 
                        $calculo = $calculo - $num; 
                    break;
                    case "x": 
                        $calculo = $calculo * $num; 
                    break;
                    case "/": 
                        $calculo = $calculo / $num; 
                    break;
                    default:
                        $calculo = $num;
                    break;
                }
                $memoria = "";
            } else { $memoria = $req[$i]; }
        }     
        return $calculo;
    }
}
