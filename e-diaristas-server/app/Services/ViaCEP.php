<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCEP
{
    /**
     * Consulta CEP no via CEP
     *
     * @param string $cep
     * @return bool|array
     */
    public function search(string $cep)
    {
        $url = sprintf('https://viacep.com.br/ws/%s/json/', $cep);

        $response = Http::get($url);

        if ($response->failed()){
            return false;
        }

        $data = $response->json();

        if (isset($data['erro']) && $data['erro'] === true)
        {
            return false;
        }

        return $data;
    }
}
