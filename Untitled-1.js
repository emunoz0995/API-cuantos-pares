

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
class ApiController extends Controller
{
    public function getPairsDifference($array, $target) {

        $pairs = 0;

        // Recorrer el array para buscar los pares que cumplan con la diferencia objetivo. 
        for ($i = 0; $i < count($array); $i++) { 

            for ($j = $i + 1; $j < count($array); $j++) { 

                if (abs($array[$i] - $array[$j]) == $target) { 

                    // Si se encuentra un par, aumentar el contador. 
                    $pairs++; 
                } 
            } 
        } 

        return response()->json([ 'pairs' => $pairs ]);     

    }  								  
}