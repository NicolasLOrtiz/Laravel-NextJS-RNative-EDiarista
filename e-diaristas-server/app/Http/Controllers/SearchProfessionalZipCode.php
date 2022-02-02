<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class SearchProfessionalZipCode extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ViaCEP $viaCEP)
    {
        $address = $viaCEP->search($request->cep);

        if($address === false) {
            return response()->json(['error' => 'CEP inválido'], 400);
        }

        return [
            'professionals' => Professional::searchForIbgeCode($address['ibge']),
            'rest_results' => Professional::restResultsForIbgeCode($address['ibge'])
        ];
    }
}
