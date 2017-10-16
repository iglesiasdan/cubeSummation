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
    public function index(Request $request)
    {
        //
       
            
            return view('cube.cube', ['results' => '']);
        
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
                        return $newIndex;
                    }
                }
            }
        }
        return $info;

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