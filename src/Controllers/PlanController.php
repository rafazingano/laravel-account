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
        return view(cwView('plans.index', true), $this->data);
    }

    public function create()
    {
        return view(cwView('plans.create', true), $this->data);
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
