<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Calculo extends Controller{
    /*
        $request -> request que veio da calculadora
        return -> devolve o resultado para a calculadora
    */
    public function calcular(Request $request){
        return $this->resolveCalculo($request->json()->all());
    }
    /*
        $request -> request que veio da calculadora
        return -> devolve o resultado para a calculadora
    */
    public function porcentagem(Request $request){
        $resultado = $this->somaValores($request->json()->all());
        $resultado -= $request->json()->get(count($request->json())-1);
        return abs(($resultado * $request->json()->get(count($request->json())-1)) / 100);
    }
    /*
        $req-> lista de valores para serem calculados
        return -> resultados de todas as operações dos valores 
    */
    public function resolveCalculo($req){
        $calculo = 0;
        $num = 0;
        $memoria = "";
        for($i = 0; $i < count($req); $i++){
            if (is_numeric($req[$i])){
                $num = $req[$i];
                $calculo = $this->calculaOperado($memoria, $calculo, $num);
                $memoria = "";
            } else { $memoria = $req[$i]; }
        }     
        return $calculo;
    }
    /*
        $req-> lista de valores para serem calculados
        return -> resultados da soma de todos os valores encontrados em $req
    */
    public function somaValores($req){
        $calculo = 0;
        $num = $req[0];
        for($i = 0; $i < count($req); $i++){
            if (is_numeric($req[$i])){
                $calculo += $req[$i];
            }
        }     
        return $calculo;
    }
    /*
        $o-> operador utilizado no calculo
        $n1 -> primeiro valor para o calculo
        $n2 -> segundo valor para o calculo
        return -> valor já calculado
    */
    public function calculaOperado($o, $n1, $n2){
        switch($o){
            case "+": 
                $n1 = $n1 + $n2; 
            break;
            case "-": 
                $n1 = $n1 - $n2; 
            break;
            case "x": 
                $n1 = $n1 * $n2; 
            break;
            case "/": 
                $n1 = $n1 / $n2; 
            break;
            default:
                $n1 = $n2;
            break;
        }
        return $n1;
    }
}
