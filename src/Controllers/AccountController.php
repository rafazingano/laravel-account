<?php

namespace ConfrariaWeb\Account\Controllers;

use App\Http\Controllers\Controller;
use ConfrariaWeb\Account\Requests\StoreAccountRequest;
use ConfrariaWeb\Account\Requests\UpdateAccountRequest;

class AccountController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {
        $data['accounts'] = resolve('AccountService')->all();
        return view(viewTemplate('index', 'account'), $data);
    }

    public function create()
    {
        return view(viewTemplate('create', 'account'));
    }

    public function store(StoreAccountRequest $request)
    {
        $account = resolve('AccountService')->create($request->all());
        return redirect('admin.accounts.index')
                ->with('status', $account? 'Realizado com sucesso' : 'Opss! Algo aconteceu de errado');
    }

    public function show($id)
    {
        $data['account'] = resolve('AccountService')->find($id);
        return view(viewTemplate('show', 'account'), $data);
    }

    public function edit($id)
    {
        $data['account'] = resolve('AccountService')->find($id);
        return view(viewTemplate('edit', 'account'), $data);
    }

    public function update(UpdateAccountRequest $request, $id)
    {
        $account = resolve('AccountService')->update($request->all(), $id);
        return redirect('admin.accounts.index')
                ->with('status', $account? 'Realizado com sucesso' : 'Opss! Algo aconteceu de errado');
    }


    public function destroy($id)
    {
        $account = resolve('AccountService')->destroy($id);
        return redirect('admin.accounts.index')
                ->with('status', $account? 'Realizado com sucesso' : 'Opss! Algo aconteceu de errado');
    }
}
