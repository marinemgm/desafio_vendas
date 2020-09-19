<?php

namespace App\Http\Controllers;

use App\DataTables\FabricanteDataTable;
use App\Http\Requests\FabricanteRequest;
use App\Models\Fabricante;
use App\Services\FabricanteService;
use Illuminate\Http\Request;
use Throwable;

class FabricanteController extends Controller
{
    public function index(FabricanteDataTable $fabricanteDataTable)
    {
        return $fabricanteDataTable->render('fabricante.index');
    }

    public function create()
    {
        return view('fabricante.form');
    }

    /*
    Ao invés de utilizar a request que vem por padrão
    vamos utilizar a request que criamos, pois nela tem as regras
    específicas para validação do fabricante
    */
    public function store(FabricanteRequest $request)
    {
        $fabricante = FabricanteService::store($request->all());

        if ($fabricante) {
            flash('Fabricante cadastrado com sucesso')->success();

            return back();
        }

        flash('Erro ao salvar o fabricante')->error();

        return back()->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit(Fabricante $fabricante)
    {
        return view('fabricante.form', compact('fabricante'));
    }

    public function update(Request $request, Fabricante $fabricante)
    {
        $fabricante = FabricanteService::update($request->all(), $fabricante);

        if ($fabricante) {
            flash('Fabricante atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o fabricante')->error();

        return back()->withInput();
    }

    public function destroy(Fabricante $fabricante)
    {
        try {
            $fabricante->delete();
        } catch (Throwable $th) {
            return response('Erro ao apagar', 400);
        }
    }
}
