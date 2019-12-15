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
        $req = $request->json()->all();
        $ultimoValor = array_pop($req);
        array_pop($req);
        $resultado = $this->resolveCalculo($req);
        if($ultimoValor == 0) $ultimoValor = $resultado;
        return ($resultado * $ultimoValor) / 100;
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
