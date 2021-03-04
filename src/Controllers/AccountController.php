<?php

namespace ConfrariaWeb\Account\Controllers;

use App\Http\Controllers\Controller;
use ConfrariaWeb\Account\Requests\StoreAccountRequest;
use ConfrariaWeb\Account\Requests\UpdateAccountRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables(Request $request)
    {
        $accounts = resolve('AccountService')->all();
        return DataTables::of($accounts)
            ->addColumn('plan', function ($account) {
                return $account->plan->name?? NULL;
            })
            ->addColumn('user', function ($account) {
                return $account->users->first()->name?? NULL;
            })
            ->editColumn('status', function ($account) {
                return $account->status ? __('activated') : __('disabled');
            })
            ->addColumn('action', function ($account) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                    <a href="' . route('dashboard.accounts.show', $account->id) . '" title="Ver" class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="' . route('dashboard.accounts.edit', $account->id) . '" title="Editar" class="btn btn-primary">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger"                     
                        href="' . route('dashboard.accounts.destroy', $account->id) . '" 
                        title="Deletar"
                        onclick="event.preventDefault();
                        document.getElementById(\'accounts-destroy-form-' . $account->id . '\').submit();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
                <form id="accounts-destroy-form-' . $account->id . '" action="' . route('dashboard.accounts.destroy', $account->id) . '" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="' . csrf_token() . '">
                    <input type="hidden" name="id" value="' . $account->id . '">
                </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make();
    }

    public function index()
    {
        $data['accounts'] = resolve('AccountService')->all();
        return view(cwView('accounts.index', true), $this->data);
    }

    public function create()
    {
        $this->data['plans'] = resolve('PlanService')->pluck();
        return view(cwView('accounts.create', true), $this->data);
    }

    public function store(StoreAccountRequest $request)
    {
        $account = resolve('AccountService')->create($request->all());
        if($account->get('error')){
            return back()->withInput()
                ->with('status', $account->get('status'));
        }
        return redirect()->route('dashboard.accounts.edit', ['account' => $account->get('obj')->id])
                ->with('status', $account->get('status'));
    }

    public function show($id)
    {
        $this->data['account'] = resolve('AccountService')->find($id);
        return view(cwView('accounts.show', true), $this->data);
    }

    public function edit($id)
    {
        $this->data['account'] = resolve('AccountService')->find($id);
        dd($this->data['account']);
        return view(cwView('accounts.edit', true), $this->data);
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
        return redirect('dashboard.accounts.index')
                ->with('status', $account? 'Realizado com sucesso' : 'Opss! Algo aconteceu de errado');
    }
}
