<?php
namespace App\Http\Controllers;
use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\User;
use App\Services\UserService;


use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('user.index');
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        {
            $user = UserService::store($request->all());
    
            if ($user) {
                flash('Usuario cadastrado com sucesso')->success();
    
                return back();
            }
    
            flash('Erro ao salvar usuario')->error();
    
            return back()->withInput();
        }
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
