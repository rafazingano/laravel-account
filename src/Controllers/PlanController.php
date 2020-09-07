<?php

namespace ConfrariaWeb\Account\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PlanController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {
        $data['plans'] = resolve('PlanService')->all();
        return view(Config::get('cw_account.views') . 'plans.index');
    }

    public function create()
    {
        return view(Config::get('cw_account.views') . 'plans.create');
    }

    public function store(Request $request)
    {
        //
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
