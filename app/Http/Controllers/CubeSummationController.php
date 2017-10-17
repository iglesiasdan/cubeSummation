<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CubeSummationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $result;
    private $matrix;
    public function index(Request $request)
    {
        //
       
            
            return view('cube.cube', ['results' => '']);
        
    }

    //this initialize the matrix
    public function initMatrix($sizeMatrix){
        $this->matrix = array();
        if (1 <= $sizeMatrix && $sizeMatrix <= 100) {
            for ($index = 0; $index < $sizeMatrix; $index++) {
                $this->matrix[$index] = array();
                for ($index1 = 0; $index1 < $sizeMatrix; $index1++) {
                    $this->matrix[$index][$index1] = array();
                    for ($index2 = 0; $index2 < $sizeMatrix; $index2++) {
                        $this->matrix[$index][$index1][$index2] = 0;
                    } 
                }
            }
        }else{
            return "error en el tamano de la matriz";
        }
    }


    public function validateQuery($query,$sizeMatrix){

    }

    //this obtains input and validate the structure and call other functions to do cubeSumation
    public function summation($query){
        $result = array();
        $validation = 0;
        $info = explode("\n",$query);
        $nCases = (integer)$info[0];
        if (1 <= $nCases && is_int($nCases)){
            $acum = 0;
            $nuevaCadena = str_replace("",$info[0],$query);
            $nuevaCadena = explode("\n",$nuevaCadena);
            for ($i=0,$index=0,$newIndex=0; $index < $nCases; $index++) { 
                if ($newIndex <= 1000) {
                    if ($index == 0) {
                        $aux = explode(" ",$nuevaCadena[1]);
                        $nQuerys = (integer)$aux[1];
                        $newIndex = 2 + $nQuerys;
                    }else{
                        if ($nuevaCadena[$newIndex]) {
                            $aux = explode(" ",$nuevaCadena[$newIndex]);
                            $nQuerys = (integer)$aux[1];
                            $sizeMatrix = (integer)$aux[0];
                            $newIndex += $nQuerys+1;
                        }
                    }
                }else {
                    return "La cantidad de querys no puede ser mayor a 1000"; 
                }
            }
            if (sizeof($info) != $newIndex) {
                return "La cantidad de querys no coincide con el formato ingresado";
            }

            $nuevaCadena = str_replace("",$info[0],$query);
            $nuevaCadena = explode("\n",$nuevaCadena);
            for ($index = 0; $index < sizeof($nuevaCadena); $index++) {
                if ($index == 0) {
                    $aux = explode(" ",$nuevaCadena[1]);
                    $nQuerys = (integer)$aux[1];
                    $sizeMatrix = (integer)$aux[0];
                }
                $verif = explode(" ",$nuevaCadena[$index]);
                if (!is_int((integer)$verif[0])) {
                   $validation =  $this->validateQuery($nuevaCadena[$index],$sizeMatrix);
                   if ($validation == -1) {
                       return -1;
                   }
                }else{
                    $aux = explode(" ",$nuevaCadena[$index]);
                    $nQuerys = (integer)$aux[1];
                    $sizeMatrix = (integer)$aux[0];
                    if ($sizeMatrix>100 || $sizeMatrix<1) {
                        return "Tamano de matriz invalido";
                    }
                    initMatrix($sizeMatrix);
                }
            }
            return $result;


        }
        return "Error en formato de la entrada";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $query = $request->get('query');
        $response = $this->summation($query);
        //response es el valor de la respuesta de los querys ingresados por el usuario
        return view('cube.cube', array('results'=>$response));
        
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        
        // $query = $request->query;
        
        // return view('cube.cube', ['results' => $query]);
       // $position = $request->query;
       //redirect(Request::url());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}