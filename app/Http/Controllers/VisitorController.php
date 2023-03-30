<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\CuantosPares;
use Illuminate\Http\Request;

/**
* @OA\Info(
*             title="Blu Bear - Prueba Tecnica", 
*             version="1.0",
*             description="API que determina el número de pares de elementos de una matriz que tienen una diferencia igual a un valor ingresado y retorna el listado de tests realizados"
* )
*
* @OA\Server(url="http://localhost:8000")
*/


class VisitorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Listado de tests realizados
     * @OA\Get (
     *     path="/api/visitors",
     *     tags={"Tests"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="int",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Karol Aguirre"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-03-30T16:07:01.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-03-30T16:07:01.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="cuantos_pares",
     *                         type="object",
     *                         @OA\Property(
     *                             property="id",
     *                             type="int",
     *                             example="24"
     *                         ),
     *                         @OA\Property(
     *                             property="array",
     *                             type="int",
     *                             example="5"
     *                         ),
     *                         @OA\Property(
     *                             property="difference",
     *                             type="int",
     *                             example="2"
     *                         ),
     *                         @OA\Property(
     *                             property="result",
     *                             type="int",
     *                             example="3"
     *                         ),
     *                         @OA\Property(
     *                             property="visitor_id",
     *                             type="int",
     *                             example="3"
     *                         ),
     *                         @OA\Property(
     *                             property="created_at",
     *                             type="string",
     *                             example="2023-03-30T16:07:47.000000Z"
     *                         ),
     *                         @OA\Property(
     *                             property="updated_at",
     *                             type="string",
     *                             example="2023-03-30T16:07:47.000000Z"
     *                         ),
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        //
        $visitors = Visitor::with('cuantos_pares')->get();
        return response()->json($visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *      path="/api/visitors",
    *      operationId="createUser",
    *      tags={"Tests"},
    *      summary="Create a new test",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserRequest")
    *      ),
    *      @OA\Response(
    *          response=201,
    *          description="User created successfully",
    *          @OA\JsonContent(ref="#/components/schemas/UserResponse")
    *      ),
    *      @OA\Response(
    *          response=422,
    *          description="Validation error",
    *          @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
    *      ),
    *      @OA\Response(
    *          response=500,
    *          description="Internal server error",
    *          @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
    *      )
    * )
    */
    

    /**
     * @OA\Schema(
     *      schema="UserRequest",
     *      title="User Request",
     *      description="Schema for creating a new test",
     *      type="object",
     *      required={"name", "array", "difference"},
     *      @OA\Property(
     *          property="name",
     *          type="string",
     *          example="John Doe",
     *      ),
     *      @OA\Property(
     *          property="array",
     *          type="int",
     *          example="5",

     *      ),
     *      @OA\Property(
     *          property="difference",
     *          type="int",
     *          example="2",
     *      )
     * )
     */
     public function store(Request $request)
    {

        try {
            $visitor = new Visitor;
        $visitor->name = $request->name;
        $visitor->save();

        $pares = new CuantosPares;
        $pares->array = $request->array;
        $pares->difference = $request->difference;
        $pares->visitor_id = $visitor->id;

        $pairs = 0;
        $arr = [];

        for($i = 1; $i <= $pares->array; $i++){
            $arr[]= $i;
        }

        for ($i = 0; $i < count($arr); $i++) { 

            for ($j = $i + 1; $j < count($arr); $j++) { 

                if (abs($arr[$i] - $arr[$j]) == $pares->difference) { 

                    $pairs++; 
                } 
            } 
        } 

        $pares->result = $pairs;
        $pares->save();
        $data = [
            'messge' => 'prueba created successfully',
            'status' => 201,
            'visitors' => $visitor,
            'pares' => $pares
        ];
        return response()->json([$data],201);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()],400);   
        }

        

        //

    }  								  


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
        return response()->json($visitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}