<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalRequest;
use App\Models\Professional;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    protected $viaCep;

    public function __construct(ViaCEP $viaCep)
    {
        $this->viaCep = $viaCep;
    }

    public function index()
    {
        $professionals = Professional::get();

        return view('index', [
            "professionals" => $professionals
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(ProfessionalRequest $request)
    {
        $data = $request->except('_token');
        $data['avatar'] = $request->avatar->store('public');

        $data['document'] = str_replace(['.', '-'], '', $data['document']);
        $data['zip_code'] = str_replace('-', '', $data['zip_code']);
        $data['phone'] = str_replace(['(', ')', ' ',  '-'], '', $data['phone']);
        $data['ibge_code'] = $this->viaCep->search($data['zip_code'])['ibge'];

        Professional::create($data);

        return redirect()->route('professionals.index');
    }

    public function edit(int $id)
    {
        $professional = Professional::findOrFail($id);

        return view('edit', [
           'professional' => $professional
        ]);
    }

    public function update(int $id, ProfessionalRequest $request)
    {
        $professional = Professional::findOrFail($id);

        $data = $request->except(['_token', '_method']);

        $data['document'] = str_replace(['.', '-'], '', $data['document']);
        $data['zip_code'] = str_replace('-', '', $data['zip_code']);
        $data['phone'] = str_replace(['(', ')', ' ',  '-'], '', $data['phone']);
        $data['ibge_code'] = $this->viaCep->search($data['zip_code'])['ibge'];

        if($request->hasFile('avatar')){
            $data['avatar'] = $request->avatar->store('public');
        }

        $professional->update($data);

        return redirect()->route('professionals.index');
    }

    public function destroy(int $id){
        $professional = Professional::findOrFail($id);

        $professional->delete();

        return redirect()->route('professionals.index');
    }
}
